class GlobalSearch {
    constructor(config = {}) {
        this.config = {
            selector: config.selector || 'table[data-searchable="true"]',
            searchInput: config.searchInput || "#global-search-input",
            excludeColumns: config.excludeColumns || [],
            noResultsClass: "no-results-found",
            debounceDelay: 300,
        };

        this.init();
    }

    init() {
        this.bindEvents();
        this.initializeTables();
    }

    bindEvents() {
        const searchInput = document.querySelector(this.config.searchInput);
        if (searchInput) {
            let debounceTimer;

            searchInput.addEventListener("input", (e) => {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    this.performSearch(e.target.value.trim().toLowerCase());
                }, this.config.debounceDelay);
            });

            // Clear search on escape key
            searchInput.addEventListener("keydown", (e) => {
                if (e.key === "Escape") {
                    e.target.value = "";
                    this.performSearch("");
                }
            });
        }
    }

    initializeTables() {
        const tables = document.querySelectorAll(this.config.selector);
        tables.forEach((table) => {
            // Add searchable attribute if not present
            if (!table.hasAttribute("data-searchable")) {
                table.setAttribute("data-searchable", "true");
            }

            // Store original rows for reset
            if (!table.originalRows) {
                table.originalRows = Array.from(
                    table.querySelectorAll("tbody tr:not(.no-results)")
                );
            }
        });
    }

    performSearch(searchTerm) {
        const tables = document.querySelectorAll(this.config.selector);

        tables.forEach((table) => {
            const tbody = table.querySelector("tbody");
            const allRows =
                table.originalRows ||
                Array.from(tbody.querySelectorAll("tr:not(.no-results)"));
            let hasVisibleRows = false;

            // Remove existing no-results message
            const existingNoResults = tbody.querySelector(".no-results");
            if (existingNoResults) {
                existingNoResults.remove();
            }

            if (!searchTerm) {
                // Show all rows
                allRows.forEach((row) => {
                    row.style.display = "";
                    row.classList.remove(this.config.noResultsClass);
                });
                return;
            }

            // Filter rows
            allRows.forEach((row) => {
                const rowText = this.getRowText(row).toLowerCase();
                const isVisible = rowText.includes(searchTerm);

                row.style.display = isVisible ? "" : "none";
                row.classList.toggle(this.config.noResultsClass, !isVisible);

                if (isVisible) hasVisibleRows = true;
            });

            // Show no results message if no rows match
            if (!hasVisibleRows && allRows.length > 0) {
                this.showNoResults(tbody, searchTerm);
            }
        });
    }

    getRowText(row) {
        const cells = Array.from(row.querySelectorAll("td, th"));
        return cells
            .filter(
                (cell, index) => !this.config.excludeColumns.includes(index)
            )
            .map((cell) => {
                // Remove button text and get only display text
                const clone = cell.cloneNode(true);
                const buttons = clone.querySelectorAll("button, a");
                buttons.forEach((btn) => btn.remove());
                return clone.textContent || clone.innerText || "";
            })
            .join(" ")
            .replace(/\s+/g, " ")
            .trim();
    }

    showNoResults(tbody, searchTerm) {
        const noResultsRow = document.createElement("tr");
        noResultsRow.className = "no-results";
        noResultsRow.innerHTML = `
            <td colspan="100%" class="px-6 py-12 text-center">
                <div class="flex flex-col items-center justify-center text-gray-500 dark:text-neutral-400">
                    <svg class="size-12 mb-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>
                    </svg>
                    <p class="text-lg font-medium text-gray-600 dark:text-neutral-300 mb-1">Tidak ada hasil ditemukan</p>
                    <p class="text-sm">Tidak ada data yang cocok dengan "<span class="font-semibold">${searchTerm}</span>"</p>
                </div>
            </td>
        `;
        tbody.appendChild(noResultsRow);
    }

    // Reset search
    reset() {
        const searchInput = document.querySelector(this.config.searchInput);
        if (searchInput) {
            searchInput.value = "";
            this.performSearch("");
        }
    }
}

// Initialize when DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
    window.globalSearch = new GlobalSearch(window.globalSearchConfig);
});
