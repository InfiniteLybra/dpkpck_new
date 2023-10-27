var j = jQuery.noConflict(true);
      function Print_Specific_Element() {
        j('#detailData').printThis({
          importCSS: true,
          importStyle: true,
          loadCSS: true,
          canvas: true
        });
      }
$("#printBtn").click(Print_Specific_Element);