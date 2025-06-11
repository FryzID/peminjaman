<div class="modal fade" id="availableCommodityModal" tabindex="-1" aria-labelledby="availableCommodityModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="availableCommodityModalLabel">Daftar Komoditas Yang Tersedia</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 mb-3">
            <table class="table datatable">
              <thead>
                <tr>
                  <!-- <th scope="col">#</th> -->
                  <th scope="col">ID</th>
                  <th scope="col">Nama Komoditas</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($availableCommodities as $commodity)
                <tr>
                  <!-- <th>{{ $loop->iteration }}</th> -->
                  <th>{{ $commodity->id }}</th>
                  <td>{{ $commodity->name }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
</div>

@push('script')
<!-- Select2 CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    // Custom matcher for commodity_id select2
    function commodityIdMatcher(params, data) {
      if ($.trim(params.term) === '') {
        return data;
      }
      if (typeof data.id === 'undefined' || data.id === '') {
        return null;
      }
      // Only match if input is exactly 8 characters
      if (params.term.length !== 8) {
        return null;
      }
      // Pad the commodity id with leading zeros to 8 chars
      var paddedId = data.id.toString().padStart(8, '0');
      // Check if the last character matches the value
      if (params.term === paddedId) {
        return data;
      }
      return null;
    }
    $('#commodity_id').select2({
      dropdownParent: $('#availableCommodityModal'),
      width: '100%',
      placeholder: 'Pilih..',
      allowClear: true,
      matcher: commodityIdMatcher
    });
  });
</script>
@endpush
