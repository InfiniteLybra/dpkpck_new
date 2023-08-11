<script>
    "use strict";
        var KTAppEcommerceCategories_1 = function() {
            var t, e, n = () => {
                t.querySelectorAll('[data-kt-ecommerce-category-filter="delete_row"]').forEach((t => {
                    t.addEventListener("click", (function(t) {
                        t.preventDefault();
                        const n = t.target.closest("tr"),
                            o = n.querySelector('[data-kt-ecommerce-category-filter="category_name"]').innerText;
                    }))
                }))
            };
            return {
                init: function() {
                    (t = document.querySelector("#table_1")) && ((e = $(t).DataTable({
                        info: !1,
                        order: [],
                        pageLength: 10,
                        columnDefs: [{
                            orderable: !1,
                            targets: 0
                        }, {
                            orderable: !1,
                            targets: 1
                        }]
                    })).on("draw", (function() {
                        n()
                    })), document.querySelector('[data-kt-ecommerce-category-filter="search_1"]').addEventListener("keyup", (function(t) {
                        e.search(t.target.value).draw()
                    })), n())
                }
            }
        }();
        KTUtil.onDOMContentLoaded((function() {
            KTAppEcommerceCategories_1.init()
        }));
    "use strict";
        var KTAppEcommerceCategories_2 = function() {
            var t, e, n = () => {
                t.querySelectorAll('[data-kt-ecommerce-category-filter="delete_row"]').forEach((t => {
                    t.addEventListener("click", (function(t) {
                        t.preventDefault();
                        const n = t.target.closest("tr"),
                            o = n.querySelector('[data-kt-ecommerce-category-filter="category_name"]').innerText;
                    }))
                }))
            };
            return {
                init: function() {
                    (t = document.querySelector("#table_2")) && ((e = $(t).DataTable({
                        info: !1,
                        order: [],
                        pageLength: 10,
                        columnDefs: [{
                            orderable: !1,
                            targets: 0
                        }, {
                            orderable: !1,
                            targets: 1
                        }]
                    })).on("draw", (function() {
                        n()
                    })), document.querySelector('[data-kt-ecommerce-category-filter="search_2"]').addEventListener("keyup", (function(t) {
                        e.search(t.target.value).draw()
                    })), n())
                }
            }
        }();
        KTUtil.onDOMContentLoaded((function() {
            KTAppEcommerceCategories_2.init()
        }));
</script>