<?php
  $pageContent = "contentPages/contentsearchfunction.php";
  include("templates/template.php");
?>
<script type="text/javascript">
  setPageTitle("Search");
  
        $(document).ready(function(){
            $('#searchForm').on('submit', function(e){
                e.preventDefault();
                var orderNumber = $('#searchOrderNumber').val();
                $.ajax({
                    url: 'processSearch.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {searchOrderNumber: orderNumber},
                    success: function(data) {
                        var tableBody = $('#resultsTable tbody');
                        tableBody.empty(); // Clear previous results
                        if(data.length > 0) {
                            $.each(data, function(index, row) {
                                var newRow = '<tr>' +
                                    '<td>' + row.OrderNo + '</td>' +
                                    '<td>' + row.OrderDate + '</td>' +
                                    '<td>' + row.CustomerName + '</td>' +
                                    '<td>' + row.ItemName + '</td>' +
                                    '<td>' + row.UnitCost + '</td>' +
                                    '<td>' + row.QuantityOrdered + '</td>' +
                                    '<td>' + row.TotalAmount + '</td>' +
                                    '</tr>';
                                tableBody.append(newRow);
                            });
                        } else {
                            tableBody.append('<tr><td colspan="7" class="text-center">No results found</td></tr>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error: " + status + error);
                    }
                });
            });
        });
    
</script>
