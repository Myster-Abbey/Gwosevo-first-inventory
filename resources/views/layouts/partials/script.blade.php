<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>

<script src="{{ asset('assets/js/pages/password-addon.init.js') }}"></script>

<!--Swiper slider js-->
<script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

<!-- swiper.init js -->
<script src="{{ asset('assets/js/pages/swiper.init.js') }}"></script>

<!-- apexcharts -->
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>

<script src="{{ asset('assets/js/pages/dashboard-ecommerce.init.js') }}"></script>

{{-- Pie chart --}}
<script src="{{ asset('assets/js/pages/apexcharts-pie.init.js') }}"></script>

<!-- list.js min js -->
<script src="{{ asset('assets/libs/list.js/list.min.js') }}"></script>
<script src="{{ asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>

<!-- tickets list-->
<script src="{{ asset('assets/js/pages/tickets-list.init.js') }}"></script>

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            lengthChange: true,
            // buttons: [ 'print', 'excel', 'pdf', 'colvis',
            // buttons: [ 'print', 'excel', 'pdf',
            buttons: [{
                    extend: 'excel',
                    exportOptions: {
                        format: {
                            body: function(data, row, column, node) {
                                // Check if the current column is the redemption_phone column (column index 3)
                                if (column === 3) {
                                    return maskPhone(data);
                                }
                                return data; // Return the original value for other columns
                            }
                        }
                    }
                },
                {
                    extend: 'pdf',
                    customize: function(doc) {
                        // Apply masking to the Phone column during PDF export
                        doc.content[1].table.body.forEach(function(row) {
                            var redemption_phone = row[3].text;
                            row[3].text = maskPhone(redemption_phone);
                        });
                    }
                },
                {
                    extend: 'print',
                    customize: function(win) {
                        // Apply masking to the Phone column during print export
                        $(win.document.body).find('td:nth-child(4)').each(function(index) {
                            var redemption_phone = $(this).text();
                            $(this).text(maskPhone(redemption_phone));
                        });
                    }
                }
            ]
        });

        // Mask Phone function
        function maskPhone(redemption_phone) {
            if (redemption_phone.length >= 10) {
                const maskedPhoneNumber = redemption_phone.substring(0, 5) + 'XXX' + redemption_phone.substring(
                    8);
                return maskedPhoneNumber;
            } else {
                // Handle invalid phone numbers with fewer than 10 digits
                return redemption_phone;
            }
        }

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var options = {
            valueNames: ['agencies_id', 'since', 'agencies_Name', 'address', 'total_property', 'employee',
                'email', 'contact'
            ]
        };

        var agenciesList = new List('agenciesList', options);

        // Event listener for checkbox "checkAll"
        document.getElementById('checkAll').addEventListener('change', function() {
            var checkboxes = document.querySelectorAll('.form-check-input[name="chk_child"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = this.checked;
            }, this);
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#example1').DataTable();
        order: [[0, 'desc']];
    });
</script>

<script>
    $(document).ready(function() {
        // Add 'active' class to the main menu when it's selected
        $('#promoDetails').on('click', function() {
            $(this).toggleClass('active');
        });

        // Add 'active' class to the submenu when it's selected
        $('.nav-link').on('click', function() {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
            $('#promoDetails').addClass('active');
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Add 'active' class to the main menu when it's selected
        $('#manageUsers').on('click', function() {
            $(this).toggleClass('active');
        });

        // Add 'active' class to the submenu when it's selected
        $('.nav-link').on('click', function() {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
            $('#manageUsers').addClass('active');
        });
    });
</script>


<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
