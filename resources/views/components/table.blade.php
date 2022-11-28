<div>
    <!--Card-->
    <div id='recipients' class="md:p-8 md:mt-6 lg:mt-0 rounded  bg-white shadow-lg overflow-x-auto overflow-y-auto w-full">
        <x-validation-errors />
        <div class="w-full flex py-2 px-4">
            {{ $input }}
        </div>
        <table id="example" class="example table table-normal w-full">
            <thead>
                <x-tr>
                    {{ $head }}
                </x-tr>
            </thead>
            <tbody>
                    {{ $body }}
            </tbody>

        </table>


    </div>
    <!--/Card-->

    <!--/container-->
    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {

            var table = $('.example').DataTable({
                    responsive: false
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
</div>
