$(document).ready(function () {
    if ($(".datatable-1").length > 0) {
        $(".datatable-1").dataTable({
            language: {
                sEmptyTable: "Heç bir məlumat mövcud deyil",
                sInfo: "_TOTAL_ sətirdən _START_ - _END_ arası göstərilir",
                sInfoEmpty: "",
                sInfoFiltered: "(_MAX_ məlumat içində tapılan)",
                sInfoPostFix: "",
                sInfoThousands: ".",
                sLengthMenu: "Göstər _MENU_",
                sLoadingRecords: "Yüklənir...",
                sProcessing: "İşlənilir...",
                sSearch: "Axtar:",
                sZeroRecords: "Uyğun məlumat tapılmadı",
                oPaginate: {
                    sFirst: "İlk",
                    sLast: "Son",
                    sNext: "Sonraki",
                    sPrevious: "Öncəki",
                },
                oAria: {
                    sSortAscending: ": artan sıralama",
                    sSortDescending: ": azalan sıralama",
                },
            },
        });
        $(".dataTables_paginate").addClass("btn-group datatable-pagination");
        $(".dataTables_paginate > a").wrapInner("<span />");
        $(".dataTables_paginate > a:first-child").append(
            '<i class="icon-chevron-left shaded"></i>'
        );
        $(".dataTables_paginate > a:last-child").append(
            '<i class="icon-chevron-right shaded"></i>'
        );

        $(".slider-range").slider({
            range: true,
            min: 0,
            max: 20000,
            values: [3000, 12000],
            slide: function (event, ui) {
                $(this).find(".ui-slider-handle").attr("title", ui.value);
            },
        });

        $("#amount").val(
            "$" +
                $(".slider-range").slider("values", 0) +
                " - $" +
                $(".slider-range").slider("values", 1)
        );
    }
});
