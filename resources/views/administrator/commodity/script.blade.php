<script>
  $(function () {
    $('#createCommodityModal').on('shown.bs.modal', () => {
      $('#createCommodityModal').find('input').not('[type=hidden]')[0].focus();
    });

    $('#editCommodityModal').on('shown.bs.modal', () => {
      $('#editCommodityModal').find('input').not('[type=hidden]')[0].focus();
    });

    $('.datatable').on('click', '.editCommodityButton', function (e) {
      let id = $(this).data('id');
      let showURL = "{{ route('api.v1.commodities.show', 'param') }}";
      let updateURL = "{{ route('administrators.commodities.update', 'param') }}";
      showURL = showURL.replace('param', id);
      updateURL = updateURL.replace('param', id);

      let input = $('#editCommodityModal :input').not('[type=hidden]').not('.btn-close').not('.close-button').not('[type=submit]');
      input.val('Sedang mengambil data..');
      input.attr('disabled', true);

      $.ajax({
        url: showURL,
        method: 'GET',
        success: (res) => {
          input.attr('disabled', false);
          $('#editCommodityModal #name').val(res.data.name);
          $('#editCommodityModal form').attr('action', updateURL);
        },
        error: (err) => {
          Swal.fire(
            'Error',
            'Terjadi kesalahan, lapor kepada administrator!',
            'error'
          );

          $('#editCommodityModal').on('shown.bs.modal', () => {
            $('#editCommodityModal').modal('hide');
          });
        }
      });
    });

    // Show barcode modal
    $('.datatable').on('click', '.show-barcode-btn', function () {
      const barcode = $(this).data('barcode');
      const name = $(this).data('name');
      $('#barcodeContainer').html(barcode);
      $('#barcodeCommodityName').text(name);
      $('#barcodeModal').modal('show');
    });

    // Download barcode SVG
    $('#downloadBarcodeBtn').on('click', function () {
      const svg = $('#barcodeContainer svg')[0];
      if (!svg) return;
      const serializer = new XMLSerializer();
      const source = serializer.serializeToString(svg);
      const blob = new Blob([source], { type: 'image/svg+xml;charset=utf-8' });
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = 'barcode.svg';
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      URL.revokeObjectURL(url);
    });
  });
</script>
