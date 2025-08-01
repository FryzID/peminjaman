<div class="modal fade" id="addBorrowingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Peminjaman</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('students.borrowings.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-12">
              <div class="mb-3">
                <label for="commodity_id_create" class="form-label">Komoditas</label>
                <select class="form-select select2 @error('commodity_id', 'store') is-invalid @enderror" name="commodity_id"
                  id="commodity_id_create" required>
                  <option value="" selected>Pilih..</option>
                  @foreach ($availableCommodities as $commodity)
                  <option value="{{ $commodity->id }}" {{ old('commodity_id')===(string)$commodity->id ?
                    'selected' :
                    '' }}>{{ $commodity->name }}</option>
                  @endforeach

                  @if(count($unavailableCommodities) > 1)
                  <option disabled>&#9866;</option>
                  @endif

                  @foreach ($unavailableCommodities as $commodity)
                  <option value="{{ $commodity->id }}" disabled>{{ $commodity->name }} - Sedang dipinjam</option>
                  @endforeach
                </select>
                @error('commodity_id', 'store')
                <div class="d-block invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="time_start" class="form-label">Jam Pinjam</label>
                <div class="input-group mb-3">
                  <span class="d-block input-group-text"><i class="bi bi-clock-fill"></i></span>
                  <input type="time" class="form-control @error('time_start', 'store') is-invalid @enderror"
                    name="time_start" @if($errors->hasBag('store'))
                  value="{{ old('time_start') }}" @endif id="time_start" required>
                  @error('time_start', 'store')
                  <div class="d-block invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-success">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@push('script')
<!-- Select2 CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  function commodityIdMatcher(params, data) {
    if ($.trim(params.term) === '') {
      return data;
    }
    if (typeof data.id === 'undefined' || data.id === '') {
      return null;
    }
    var term = params.term.toLowerCase();
    var id = data.id.toString().toLowerCase();
    var paddedId = id.padStart(8, '0');
    var text = (data.text || '').toLowerCase();
    // Match if search term is part of the ID, padded ID, or name
    if (id.indexOf(term) !== -1 || paddedId.indexOf(term) !== -1 || text.indexOf(term) !== -1) {
      return data;
    }
    return null;
  }
  $('#addBorrowingModal').on('shown.bs.modal', function () {
    $('#commodity_id_create').select2({
      dropdownParent: $('#addBorrowingModal'),
      width: '100%',
      placeholder: 'Pilih..',
      allowClear: true,
      matcher: commodityIdMatcher
    });
  });
</script>
@endpush
