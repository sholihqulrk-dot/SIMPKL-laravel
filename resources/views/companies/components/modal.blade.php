<!-- Delete Company Modal -->
<div id="hs-delete-company-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-delete-company-modal-label">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-2xl md:w-full m-3 md:mx-auto">
    <div class="relative flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl overflow-hidden dark:bg-neutral-900 dark:border-neutral-800">
      <div class="absolute top-2 end-2">
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-delete-company-modal">
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
            <h3 id="hs-delete-company-modal-label" class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
              Konfirmasi Penghapusan
            </h3>
            <p class="text-gray-500 dark:text-neutral-500 mb-4">
              Apakah Anda yakin ingin menghapus data perusahaan berikut?
            </p>

            <!-- Preview Data -->
            <div class="text-sm bg-gray-50 dark:bg-neutral-800 p-3 rounded-lg mb-4">
              <p class="font-medium text-gray-800 dark:text-neutral-200" id="modal-company-name">—</p>
              <p class="text-gray-600 dark:text-neutral-400" id="modal-company-business-field">Bidang Usaha: —</p>
              <p class="text-gray-600 dark:text-neutral-400" id="modal-company-email">Email: —</p>
            </div>

            <p class="text-red-600 dark:text-red-400 text-sm font-medium">
              ⚠️ Tindakan ini tidak dapat dibatalkan. Semua data terkait perusahaan ini akan dihapus permanen.
            </p>
          </div>
        </div>
      </div>

      <!-- Form Delete -->
      <form id="delete-company-form" method="POST" action="">
        @csrf
        @method('DELETE')
        <input type="hidden" name="company_id" id="company-id-input" value="">

        <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t border-gray-200 dark:bg-neutral-950 dark:border-neutral-800">
          <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#hs-delete-company-modal">
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

<!-- Import Company Modal -->
<div id="hs-import-company-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-import-company-modal-label">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-4xl md:w-full m-3 md:mx-auto">
    <div class="relative flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl overflow-hidden dark:bg-neutral-900 dark:border-neutral-800">
      <div class="absolute top-2 end-2">
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-import-company-modal">
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
            <h3 id="hs-import-company-modal-label" class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
              Import Data Perusahaan
            </h3>
            <p class="text-gray-500 dark:text-neutral-500 mb-4">
              Upload file Excel (.xlsx, .xls, .csv) yang berisi data perusahaan. Pastikan format file sesuai dengan template.
            </p>

            <!-- Form Import -->
            <form action="{{ route('admin.companies.import') }}" method="POST" enctype="multipart/form-data">
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
                    <li>• Pastikan format file sesuai template</li>
                    <li>• Password default untuk akun baru: <strong>password123</strong></li>
                    <li>• Email perusahaan harus unik</li>
                    <li>• Kolom bertanda bintang (*) wajib diisi</li>
                    <li>• Data supervisor dan HR wajib diisi</li>
                  </ul>
                </div>

                <!-- Preview Struktur Data -->
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 dark:bg-neutral-800 dark:border-neutral-700">
                  <h4 class="text-sm font-semibold text-gray-800 dark:text-neutral-200 mb-2">
                    Kolom Wajib Diisi:
                  </h4>
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs">
                    <div class="flex items-center">
                      <span class="text-red-500 mr-1">*</span>
                      <span>nama_perusahaan</span>
                    </div>
                    <div class="flex items-center">
                      <span class="text-red-500 mr-1">*</span>
                      <span>bidang_usaha</span>
                    </div>
                    <div class="flex items-center">
                      <span class="text-red-500 mr-1">*</span>
                      <span>email</span>
                    </div>
                    <div class="flex items-center">
                      <span class="text-red-500 mr-1">*</span>
                      <span>telepon</span>
                    </div>
                    <div class="flex items-center">
                      <span class="text-red-500 mr-1">*</span>
                      <span>alamat</span>
                    </div>
                    <div class="flex items-center">
                      <span class="text-red-500 mr-1">*</span>
                      <span>nama_supervisor</span>
                    </div>
                    <div class="flex items-center">
                      <span class="text-red-500 mr-1">*</span>
                      <span>email_supervisor</span>
                    </div>
                    <div class="flex items-center">
                      <span class="text-red-500 mr-1">*</span>
                      <span>telepon_supervisor</span>
                    </div>
                    <div class="flex items-center">
                      <span class="text-red-500 mr-1">*</span>
                      <span>nama_hr</span>
                    </div>
                    <div class="flex items-center">
                      <span class="text-red-500 mr-1">*</span>
                      <span>email_hr</span>
                    </div>
                    <div class="flex items-center">
                      <span class="text-red-500 mr-1">*</span>
                      <span>telepon_hr</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-6 flex justify-end gap-3">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#hs-import-company-modal">
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

<!-- Export Company Modal -->
<div id="hs-export-company-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-export-company-modal-label">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-2xl md:w-full m-3 md:mx-auto">
    <div class="relative flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl overflow-hidden dark:bg-neutral-900 dark:border-neutral-800">
      <div class="absolute top-2 end-2">
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-export-company-modal">
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
            <h3 id="hs-export-company-modal-label" class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
              Export Data Perusahaan
            </h3>
            <p class="text-gray-500 dark:text-neutral-500 mb-4">
              Pilih opsi export data perusahaan yang diinginkan.
            </p>

            <div class="space-y-3">
              <a href="{{ route('admin.companies.export', ['type' => 'all']) }}" 
                 class="w-full flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50 dark:border-neutral-700 dark:hover:bg-neutral-800">
                <div>
                  <p class="font-medium text-gray-800 dark:text-neutral-200">Export Semua Data</p>
                  <p class="text-sm text-gray-500 dark:text-neutral-400">Export seluruh data perusahaan</p>
                </div>
                <svg class="shrink-0 size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                </svg>
              </a>

              <div class="w-full p-3 border border-gray-200 rounded-lg dark:border-neutral-700">
                <p class="font-medium text-gray-800 dark:text-neutral-200 mb-2">Export Data Terpilih</p>
                <p class="text-sm text-gray-500 dark:text-neutral-400 mb-3">Pilih perusahaan yang ingin diexport (akan diimplementasikan)</p>
                
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

<!-- Modal Detail Perusahaan -->
<div id="company-detail-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="company-detail-modal-label">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-4xl sm:w-full m-3 h-[calc(100%-56px)] sm:mx-auto">
    <div class="max-h-full overflow-hidden flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-900 dark:border-neutral-800 dark:shadow-neutral-700/70">
      <!-- Header -->
      <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-800">
        <h3 id="company-detail-modal-label" class="font-bold text-gray-800 dark:text-neutral-200">
          Detail Perusahaan
        </h3>
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#company-detail-modal">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"/>
            <path d="m6 6 12 12"/>
          </svg>
        </button>
      </div>

      <!-- Body Content -->
      <div class="p-4 overflow-y-auto">
        <div class="sm:divide-y divide-gray-200 dark:divide-neutral-700">
          <!-- Informasi Umum -->
          <div class="py-3 sm:py-6">
            <h4 class="mb-4 text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">
              Informasi Umum
            </h4>

            <div class="grid gap-4 sm:grid-cols-2">
              <!-- Nama Perusahaan -->
              <div class="bg-white p-4 transition duration-300 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                <div class="flex gap-x-4">
                  <div class="mt-1 flex justify-center shrink-0">
                    <svg class="size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z"/>
                    </svg>
                  </div>
                  <div class="grow">
                    <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500">
                      Nama Perusahaan
                    </h3>
                    <p class="mt-1 text-sm text-gray-800 dark:text-neutral-200" id="detail-modal-company-name">-</p>
                  </div>
                </div>
              </div>

              <!-- Bidang Usaha -->
              <div class="bg-white p-4 transition duration-300 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                <div class="flex gap-x-4">
                  <div class="mt-1 flex justify-center shrink-0">
                    <svg class="size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                    </svg>
                  </div>
                  <div class="grow">
                    <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500">
                      Bidang Usaha
                    </h3>
                    <p class="mt-1 text-sm text-gray-800 dark:text-neutral-200" id="modal-business-field">-</p>
                  </div>
                </div>
              </div>

              <!-- Alamat -->
              <div class="bg-white p-4 transition duration-300 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800 sm:col-span-2">
                <div class="flex gap-x-4">
                  <div class="mt-1 flex justify-center shrink-0">
                    <svg class="size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg>
                  </div>
                  <div class="grow">
                    <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500">
                      Alamat
                    </h3>
                    <p class="mt-1 text-sm text-gray-800 dark:text-neutral-200" id="modal-address">-</p>
                  </div>
                </div>
              </div>

              <!-- Kontak -->
              <div class="bg-white p-4 transition duration-300 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                <div class="flex gap-x-4">
                  <div class="mt-1 flex justify-center shrink-0">
                    <svg class="size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                  </div>
                  <div class="grow">
                    <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500">
                      Telepon
                    </h3>
                    <p class="mt-1 text-sm text-gray-800 dark:text-neutral-200" id="modal-phone">-</p>
                  </div>
                </div>
              </div>

              <!-- Email -->
              <div class="bg-white p-4 transition duration-300 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                <div class="flex gap-x-4">
                  <div class="mt-1 flex justify-center shrink-0">
                    <svg class="size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                    </svg>
                  </div>
                  <div class="grow">
                    <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500">
                      Email
                    </h3>
                    <p class="mt-1 text-sm text-gray-800 dark:text-neutral-200" id="modal-email">-</p>
                  </div>
                </div>
              </div>

              <!-- Website -->
              <div class="bg-white p-4 transition duration-300 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                <div class="flex gap-x-4">
                  <div class="mt-1 flex justify-center shrink-0">
                    <svg class="size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                    </svg>
                  </div>
                  <div class="grow">
                    <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500">
                      Website
                    </h3>
                    <p class="mt-1 text-sm text-gray-800 dark:text-neutral-200" id="modal-website">-</p>
                  </div>
                </div>
              </div>

              <!-- NPWP -->
              <div class="bg-white p-4 transition duration-300 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                <div class="flex gap-x-4">
                  <div class="mt-1 flex justify-center shrink-0">
                    <svg class="size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                      <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                      <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                    </svg>
                  </div>
                  <div class="grow">
                    <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500">
                      NPWP
                    </h3>
                    <p class="mt-1 text-sm text-gray-800 dark:text-neutral-200" id="modal-npwp">-</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Statistik & Status -->
          <div class="py-3 sm:py-6">
            <h4 class="mb-4 text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">
              Statistik & Status
            </h4>

            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
              <!-- Status -->
              <div class="bg-white p-4 transition duration-300 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800 text-center">
                <div class="flex flex-col items-center">
                  <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500 mb-2">
                    Status
                  </h3>
                  <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-800/30 dark:text-green-500" id="modal-status">-</span>
                </div>
              </div>

              <!-- Total Karyawan -->
              <div class="bg-white p-4 transition duration-300 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800 text-center">
                <div class="flex flex-col items-center">
                  <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500 mb-2">
                    Total Karyawan
                  </h3>
                  <p class="text-2xl font-bold text-gray-800 dark:text-neutral-200" id="modal-total-employees">-</p>
                </div>
              </div>

              <!-- Siswa Aktif -->
              <div class="bg-white p-4 transition duration-300 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800 text-center">
                <div class="flex flex-col items-center">
                  <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500 mb-2">
                    Siswa Aktif
                  </h3>
                  <p class="text-2xl font-bold text-gray-800 dark:text-neutral-200" id="modal-active-students">-</p>
                </div>
              </div>

              <!-- Rating -->
              <div class="bg-white p-4 transition duration-300 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800 text-center">
                <div class="flex flex-col items-center">
                  <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500 mb-2">
                    Rating
                  </h3>
                  <div class="flex items-center gap-1" id="modal-rating">
                    <span class="text-2xl font-bold text-gray-800 dark:text-neutral-200">-</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Informasi Pembimbing & HR -->
          <div class="py-3 sm:py-6">
            <h4 class="mb-4 text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">
              Kontak Perusahaan
            </h4>

            <div class="grid gap-4 sm:grid-cols-2">
              <!-- Pembimbing Industri -->
              <div class="bg-white p-4 transition duration-300 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                <div class="flex gap-x-4">
                  <div class="mt-1 flex justify-center shrink-0">
                    <svg class="size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                    </svg>
                  </div>
                  <div class="grow">
                    <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500 mb-2">
                      Pembimbing Industri
                    </h3>
                    <div class="space-y-2 text-sm">
                      <p><strong>Nama:</strong> <span id="modal-supervisor-name">-</span></p>
                      <p><strong>Jabatan:</strong> <span id="modal-supervisor-position">-</span></p>
                      <p><strong>Telepon:</strong> <span id="modal-supervisor-phone">-</span></p>
                      <p><strong>Email:</strong> <span id="modal-supervisor-email">-</span></p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- HR -->
              <div class="bg-white p-4 transition duration-300 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                <div class="flex gap-x-4">
                  <div class="mt-1 flex justify-center shrink-0">
                    <svg class="size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                    </svg>
                  </div>
                  <div class="grow">
                    <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500 mb-2">
                      HR
                    </h3>
                    <div class="space-y-2 text-sm">
                      <p><strong>Nama:</strong> <span id="modal-hr-name">-</span></p>
                      <p><strong>Jabatan:</strong> <span id="modal-hr-position">-</span></p>
                      <p><strong>Telepon:</strong> <span id="modal-hr-phone">-</span></p>
                      <p><strong>Email:</strong> <span id="modal-hr-email">-</span></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Informasi PKL -->
          <div class="py-3 sm:py-6">
            <h4 class="mb-4 text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">
              Informasi PKL
            </h4>

            <div class="grid gap-4 sm:grid-cols-2">
              <!-- Jadwal & Durasi -->
              <div class="bg-white p-4 transition duration-300 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                <div class="flex gap-x-4">
                  <div class="mt-1 flex justify-center shrink-0">
                    <svg class="size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                      <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                    </svg>
                  </div>
                  <div class="grow">
                    <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500 mb-2">
                      Jadwal & Durasi
                    </h3>
                    <div class="space-y-2 text-sm">
                      <p><strong>Jadwal Kerja:</strong> <span id="modal-work-schedule">-</span></p>
                      <p><strong>Durasi PKL:</strong> <span id="modal-pkl-duration">-</span></p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Fasilitas & Program -->
              <div class="bg-white p-4 transition duration-300 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                <div class="flex gap-x-4">
                  <div class="mt-1 flex justify-center shrink-0">
                    <svg class="size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8.5 5.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L7 7l-.549.317a.5.5 0 1 0 .5.866l.549-.317V8.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L9 7l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V5.5zm-2 4.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                      <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                    </svg>
                  </div>
                  <div class="grow">
                    <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500 mb-2">
                      Fasilitas & Program
                    </h3>
                    <div class="space-y-2 text-sm">
                      <p><strong>Fasilitas:</strong> <span id="modal-facilities">-</span></p>
                      <p><strong>Program Pelatihan:</strong> <span id="modal-training-program">-</span></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Deskripsi -->
          <div class="py-3 sm:py-6">
            <h4 class="mb-4 text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">
              Deskripsi Perusahaan
            </h4>

            <div class="bg-white p-4 transition duration-300 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
              <div class="flex gap-x-4">
                <div class="mt-1 flex justify-center shrink-0">
                  <svg class="size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                  </svg>
                </div>
                <div class="grow">
                  <p class="text-sm text-gray-800 dark:text-neutral-200 leading-relaxed" id="modal-description">
                    Tidak ada deskripsi
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-800">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700" data-hs-overlay="#company-detail-modal">
          Tutup
        </button>
      </div>
    </div>
  </div>
</div>

<script>
// Versi update: ambil data dari atribut data-detail-company-*
document.addEventListener('DOMContentLoaded', function() {
  console.log('DOM loaded, initializing company modal...');

  window.openCompanyDetailModal = function(companyData) {
    try {
      console.log('Attempting to open modal...');

      // Cek elemen modal utama dulu
      const modal = document.getElementById('company-detail-modal');
      if (!modal) {
        console.error('❌ Modal element not found!');
        alert('Modal tidak ditemukan. Silakan refresh halaman.');
        return;
      }

      // Fungsi helper untuk set content dengan safety check
      function setContent(id, value) {
        const element = document.getElementById(id);
        if (element) {
          element.textContent = value || '-';
        } else {
          console.warn(`⚠️ Element #${id} not found`);
        }
      }

      // Set data ke elemen modal
      setContent('detail-modal-company-name', companyData.name);
      setContent('modal-business-field', companyData.business_field);
      setContent('modal-address', companyData.address);
      setContent('modal-phone', companyData.phone);
      setContent('modal-email', companyData.email);
      setContent('modal-website', companyData.website);
      setContent('modal-npwp', companyData.npwp);
      setContent('modal-established-year', companyData.established_year);
      setContent('modal-total-employees', companyData.total_employees);
      setContent('modal-active-students', companyData.active_students);
      setContent('modal-supervisor-name', companyData.supervisor_name);
      setContent('modal-supervisor-position', companyData.supervisor_position);
      setContent('modal-supervisor-phone', companyData.supervisor_phone);
      setContent('modal-supervisor-email', companyData.supervisor_email);
      setContent('modal-hr-name', companyData.hr_name);
      setContent('modal-hr-position', companyData.hr_position);
      setContent('modal-hr-phone', companyData.hr_phone);
      setContent('modal-hr-email', companyData.hr_email);
      setContent('modal-work-schedule', companyData.work_schedule);
      setContent('modal-pkl-duration', companyData.pkl_duration);
      setContent('modal-facilities', companyData.facilities);
      setContent('modal-training-program', companyData.training_program);
      setContent('modal-description', companyData.description);

      // Handle status
      const statusElement = document.getElementById('modal-status');
      if (statusElement) {
        if (companyData.status === 'active') {
          statusElement.textContent = 'Aktif';
          statusElement.className =
            'inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-800/30 dark:text-green-500';
        } else {
          statusElement.textContent = 'Tidak Aktif';
          statusElement.className =
            'inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-800/30 dark:text-red-500';
        }
      }

      // Handle rating
      const ratingElement = document.getElementById('modal-rating');
      if (ratingElement) {
        if (companyData.rating) {
          ratingElement.innerHTML = `
            <span class="text-2xl font-bold text-gray-800 dark:text-neutral-200">${companyData.rating}</span>
            <svg class="size-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>
          `;
        } else {
          ratingElement.innerHTML =
            '<span class="text-2xl font-bold text-gray-800 dark:text-neutral-200">-</span>';
        }
      }

      console.log('✅ Modal data set successfully');

      // Buka modal
      if (typeof HSOverlay !== 'undefined') {
        HSOverlay.open(modal);
      } else {
        modal.classList.remove('hidden');
      }
    } catch (error) {
      console.error('❌ Error opening modal:', error);
      alert('Terjadi error saat membuka detail perusahaan: ' + error.message);
    }
  };

  // Event listener: klik tombol detail
  document.addEventListener('click', function(e) {
    const viewBtn = e.target.closest('.hs-view-company-btn');
    if (viewBtn) {
      e.preventDefault();
      console.log('View company button clicked');

      // Ambil semua data dari atribut data-detail-company-*
      const data = {};
      const attributes = viewBtn.attributes;

      for (let i = 0; i < attributes.length; i++) {
        const attr = attributes[i];
        if (attr.name.startsWith('data-detail-company-')) {
          const key = attr.name.replace('data-detail-company-', '');
          data[key] = attr.value;
        }
      }

      console.log('Collected data:', data);
      openCompanyDetailModal(data);
    }
  });

  console.log('✅ Company modal initialized successfully');
});
</script>



<script>
document.addEventListener('DOMContentLoaded', function() {
  // File input preview untuk import
  const fileInput = document.getElementById('import-file');
  if (fileInput) {
      fileInput.addEventListener('change', function(e) {
          const fileName = e.target.files[0]?.name;
          if (fileName) {
              console.log('File selected for company import:', fileName);
          }
      });
  }
});

document.addEventListener('DOMContentLoaded', function () {
    // Tombol hapus di tabel
    const deleteButtons = document.querySelectorAll('.hs-delete-company-btn');
    const modal = document.getElementById('hs-delete-company-modal');
    const form = document.getElementById('delete-company-form');
    const namePreview = document.getElementById('modal-company-name');
    const businessFieldPreview = document.getElementById('modal-company-business-field');
    const emailPreview = document.getElementById('modal-company-email');
    const hiddenInput = document.getElementById('company-id-input');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const companyId = this.getAttribute('data-company-id');
            const companyName = this.getAttribute('data-company-name');
            const companyBusinessField = this.getAttribute('data-company-business-field');
            const companyEmail = this.getAttribute('data-company-email');

            // Isi preview
            namePreview.textContent = companyName;
            businessFieldPreview.textContent = `Bidang Usaha: ${companyBusinessField}`;
            emailPreview.textContent = `Email: ${companyEmail}`;

            // Set nilai input hidden & action form
            hiddenInput.value = companyId;
            form.action = `/admin/companies/${companyId}`;

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