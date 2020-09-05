require('./bootstrap')
import 'remodal'

document.addEventListener('DOMContentLoaded', function() {

  $('.js-create-order').on('click', function(e) {
    e.preventDefault()

    var inst = $('#modal-order').remodal({
      hashTracking: false,
      settings: {
        hashTracking: false,
      },
    })

    const $productId = $(this).data('product-id')

    $('#order_product_id').val($productId)

    inst.open()
  })
})
