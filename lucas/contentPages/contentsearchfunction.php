
<h3 class="text-center">Search your Order</h3>
<div class="container mb-4"></div>
<div class="container mt-5">
        <h3 class="text-center">Search your Order</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="searchForm" method="POST" action="javascript:void(0);">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="searchOrderNumber" name="searchOrderNumber" placeholder="Enter Order Number" aria-label="Enter Order Number" aria-describedby="searchButton">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="searchButton" onclick="validateOrder()">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <table class="table table-bordered mt-3" id="resultsTable">
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Order Date</th>
                            <th>Customer Name</th>
                            <th>Item Name</th>
                            <th>Unit Cost</th>
                            <th>Quantity Ordered</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    
  
