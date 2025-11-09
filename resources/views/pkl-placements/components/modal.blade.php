<!-- Delete Placement Modal -->
<div id="hs-delete-placement-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-delete-placement-modal-label">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-2xl md:w-full m-3 md:mx-auto">
    <div class="relative flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl overflow-hidden dark:bg-neutral-900 dark:border-neutral-800">
      <div class="absolute top-2 end-2">
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-delete-placement-modal">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <div class="p-4 sm:p-10 overflow-y-auto">
        <div class="flex gap-x-4 md:gap-x-7">
          <!-- Icon -->
          <span class="shrink-0 inline-flex justify-center items-center size-11 sm:w-15.5 sm:h-15.5 rounded-full border-4 border-red-50 bg-red-100 text-red-500 dark:bg-red-700 dark:border-red-600 dark:text-red-100">
            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
          </span>
          <!-- End Icon -->

          <div class="grow">
            <h3 id="hs-delete-placement-modal-label" class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
              Konfirmasi Penghapusan
            </h3>
            <p class="text-gray-500 dark:text-neutral-500 mb-4">
              Apakah Anda yakin ingin menghapus data penempatan PKL berikut?
            </p>

            <!-- Preview Data -->
            <div class="text-sm bg-gray-50 dark:bg-neutral-800 p-3 rounded-lg mb-4">
              <p class="font-medium text-gray-800 dark:text-neutral-200" id="modal-placement-student">Siswa: —</p>
              <p class="text-gray-600 dark:text-neutral-400" id="modal-placement-company">Perusahaan: —</p>
              <p class="text-gray-600 dark:text-neutral-400" id="modal-placement-period">Periode: —</p>
            </div>

            <p class="text-red-600 dark:text-red-400 text-sm font-medium">
              ⚠️ Tindakan ini tidak dapat dibatalkan. Data penempatan PKL akan dihapus permanen.
            </p>
          </div>
        </div>
      </div>

      <!-- Form Delete -->
      <form id="delete-placement-form" method="POST" action="">
        @csrf
        @method('DELETE')
        <input type="hidden" name="placement_id" id="placement-id-input" value="">

        <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t border-gray-200 dark:bg-neutral-950 dark:border-neutral-800">
          <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#hs-delete-placement-modal">
            Batal
          </button>
          <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Z"/>
            </svg>
            Hapus Permanen
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Import Placement Modal -->
<div id="hs-import-placement-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-import-placement-modal-label">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-4xl md:w-full m-3 md:mx-auto">
    <div class="relative flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl overflow-hidden dark:bg-neutral-900 dark:border-neutral-800">
      <div class="absolute top-2 end-2">
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-import-placement-modal">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <div class="p-4 sm:p-10 overflow-y-auto">
        <div class="flex gap-x-4 md:gap-x-7">
          <!-- Icon -->
          <span class="shrink-0 inline-flex justify-center items-center size-11 sm:w-15.5 sm:h-15.5 rounded-full border-4 border-blue-50 bg-blue-100 text-blue-500 dark:bg-blue-700 dark:border-blue-600 dark:text-blue-100">
            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
              <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
            </svg>
          </span>
          <!-- End Icon -->

          <div class="grow">
            <h3 id="hs-import-placement-modal-label" class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
              Import Data Penempatan PKL
            </h3>
            <p class="text-gray-500 dark:text-neutral-500 mb-4">
              Upload file Excel (.xlsx, .xls, .csv) yang berisi data penempatan PKL. Pastikan format file sesuai dengan template.
            </p>

            <!-- Form Import -->
            <form action="{{ route('admin.pkl-placements.import') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="space-y-4">
                <div>
                  <label for="import-file" class="block text-sm font-medium text-gray-700 dark:text-neutral-300 mb-2">
                    Pilih File Excel
                  </label>
                  <input type="file" name="file" id="import-file" 
                         class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
                                file:bg-gray-50 file:border-0 file:bg-gray-100 file:me-4
                                file:py-2 file:px-4
                                dark:file:bg-neutral-700 dark:file:text-neutral-400"
                         accept=".xlsx,.xls,.csv" required>
                  <p class="text-xs text-gray-500 dark:text-neutral-400 mt-1">
                    Format yang didukung: .xlsx, .xls, .csv (Maksimal: 10MB)
                  </p>
                </div>

                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 dark:bg-yellow-900/20 dark:border-yellow-800">
                  <h4 class="text-sm font-semibold text-yellow-800 dark:text-yellow-500 mb-2">
                    Catatan Penting:
                  </h4>
                  <ul class="text-xs text-yellow-700 dark:text-yellow-400 space-y-1">
                    <li>• Gunakan template yang disediakan untuk memastikan format benar</li>
                    <li>• Template sudah dilengkapi dropdown untuk memilih siswa, perusahaan, dan guru</li>
                    <li>• Format tanggal: DD/MM/YYYY (contoh: 01/01/2024)</li>
                    <li>• Total minggu akan dihitung otomatis</li>
                    <li>• Kolom bertanda bintang (*) wajib diisi</li>
                  </ul>
                </div>

                <!-- Preview Struktur Data -->
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 dark:bg-neutral-800 dark:border-neutral-700">
                  <h4 class="text-sm font-semibold text-gray-800 dark:text-neutral-200 mb-2">
                    Struktur Kolom Excel:
                  </h4>
                  <div class="overflow-x-auto">
                    <table class="min-w-full text-xs">
                      <thead>
                        <tr class="bg-gray-100 dark:bg-neutral-700">
                          <th class="px-3 py-2 text-left font-medium">STUDENT_ID*</th>
                          <th class="px-3 py-2 text-left font-medium">COMPANY_ID*</th>
                          <th class="px-3 py-2 text-left font-medium">TEACHER_ID</th>
                          <th class="px-3 py-2 text-left font-medium">TANGGAL_MULAI*</th>
                          <th class="px-3 py-2 text-left font-medium">TANGGAL_SELESAI*</th>
                          <th class="px-3 py-2 text-left font-medium">STATUS*</th>
                        </tr>
                      </thead>
                      <tbody class="divide-y divide-gray-200 dark:divide-neutral-600">
                        <tr>
                          <td class="px-3 py-2 font-mono">1</td>
                          <td class="px-3 py-2 font-mono">1</td>
                          <td class="px-3 py-2 font-mono">1</td>
                          <td class="px-3 py-2">01/01/2024</td>
                          <td class="px-3 py-2">01/04/2024</td>
                          <td class="px-3 py-2">pending</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <p class="text-xs text-gray-500 dark:text-neutral-400 mt-2">
                    <span class="text-red-500">*</span> = Wajib diisi
                  </p>
                </div>
              </div>

              <div class="mt-6 flex justify-end gap-3">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#hs-import-placement-modal">
                  Batal
                </button>
                <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                  </svg>
                  Import Data
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Export Placement Modal -->
<div id="hs-export-placement-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-export-placement-modal-label">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-2xl md:w-full m-3 md:mx-auto">
    <div class="relative flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl overflow-hidden dark:bg-neutral-900 dark:border-neutral-800">
      <div class="absolute top-2 end-2">
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-export-placement-modal">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <div class="p-4 sm:p-10 overflow-y-auto">
        <div class="flex gap-x-4 md:gap-x-7">
          <!-- Icon -->
          <span class="shrink-0 inline-flex justify-center items-center size-11 sm:w-15.5 sm:h-15.5 rounded-full border-4 border-green-50 bg-green-100 text-green-500 dark:bg-green-700 dark:border-green-600 dark:text-green-100">
            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
              <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
            </svg>
          </span>
          <!-- End Icon -->

          <div class="grow">
            <h3 id="hs-export-placement-modal-label" class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
              Export Data Penempatan PKL
            </h3>
            <p class="text-gray-500 dark:text-neutral-500 mb-4">
              Pilih opsi export data penempatan PKL yang diinginkan.
            </p>

            <div class="space-y-3">
              <a href="{{ route('admin.pkl-placements.export', ['type' => 'all']) }}" 
                 class="w-full flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50 dark:border-neutral-700 dark:hover:bg-neutral-800">
                <div>
                  <p class="font-medium text-gray-800 dark:text-neutral-200">Export Semua Data</p>
                  <p class="text-sm text-gray-500 dark:text-neutral-400">Export seluruh data penempatan PKL</p>
                </div>
                <svg class="shrink-0 size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                </svg>
              </a>

              <div class="w-full p-3 border border-gray-200 rounded-lg dark:border-neutral-700">
                <p class="font-medium text-gray-800 dark:text-neutral-200 mb-2">Export Data Terpilih</p>
                <p class="text-sm text-gray-500 dark:text-neutral-400 mb-3">Pilih penempatan PKL yang ingin diexport (akan diimplementasikan)</p>
                
                <button type="button" 
                        class="w-full mt-3 py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        disabled>
                  Fitur Akan Datang
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // File input preview untuk import
    const fileInput = document.getElementById('import-file');
    if (fileInput) {
        fileInput.addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            if (fileName) {
                console.log('File selected for placement import:', fileName);
            }
        });
    }
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Tombol hapus di tabel
    const deleteButtons = document.querySelectorAll('.hs-delete-placement-btn');
    const modal = document.getElementById('hs-delete-placement-modal');
    const form = document.getElementById('delete-placement-form');
    const studentPreview = document.getElementById('modal-placement-student');
    const companyPreview = document.getElementById('modal-placement-company');
    const periodPreview = document.getElementById('modal-placement-period');
    const hiddenInput = document.getElementById('placement-id-input');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const placementId = this.getAttribute('data-placement-id');
            const studentName = this.getAttribute('data-student-name');
            const companyName = this.getAttribute('data-company-name');
            const startDate = this.getAttribute('data-start-date');
            const endDate = this.getAttribute('data-end-date');

            // Isi preview
            studentPreview.textContent = `Siswa: ${studentName}`;
            companyPreview.textContent = `Perusahaan: ${companyName}`;
            periodPreview.textContent = `Periode: ${startDate} s/d ${endDate}`;

            // Set nilai input hidden & action form
            hiddenInput.value = placementId;
            form.action = `/admin/pkl-placements/${placementId}`;

            // Buka modal
            if (typeof HSOverlay !== 'undefined') {
                HSOverlay.open(modal);
            } else {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }
        });
    });

    // Tutup modal saat klik di luar (opsional, jika tidak pakai HS)
    if (modal && !modal.hasAttribute('data-hs-overlay')) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        });
    }
});
</script>