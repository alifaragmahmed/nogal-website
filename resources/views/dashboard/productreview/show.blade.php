 
<div class="w3-padding w3-xxlarge w3-text-gray" style="border-bottom: 2px dashed lightgray"  >
    {{ $product->name_ar }}
</div>
<!-- Header -->
<table class="table w3-text-gray text-center" > 
    <canvas id="myChart"  ></canvas>
</table>
<br>
<table class="table w3-text-gray text-center" >
    <tr>
        <th>م</th>
        <th>الصنف</th>
        <th>المستخدم</th>
        <th>التعليق</th>
        <th>التقيم</th>
    </tr>
    <?php $counter = 1; ?>
    @foreach($product->userreview()->get() as $review)
    @php 

    $html = "";
    for($i = 1; $i <= 5; $i ++) {
        if ($i <= $review->rate)
        $html .= "<i class='fa fa-star w3-text-orange' ></i>";
        else
        $html .= "<i class='fa fa-star w3-text-gray' ></i>";
        } 
    @endphp
    <tr>
        <td>{{ $counter ++ }}</td>
        <td>{{ $review->product->name_ar }}</td>
        <td>{{ $review->user->name }}</td>
        <td>{{ $review->comment }}</td>
        <td>{!! $html !!}</td>
        <td>
            <button class="w3-text-red w3-round w3-button" onclick="removeReview('{{ url('/dashboard/productreview/remove/') . '/' . $review->id }}', this)" >
                <i class="fa fa-trash" ></i>
            </button>
        </td>
    </tr>
    @endforeach 
</table> 

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
            type: 'line',
                    data: {
                    labels: [
                            @foreach($product->userreview()->get() as $review)
                            '{{ $review->user->name }}',
                            @endforeach
                    ],
                            datasets: [{
                            label: 'مرجعات المستخدمين',
                                    data: [
                                            @foreach($product->userreview()->get() as $review)
                                            '{{ $review->rate }}',
                                            @endforeach
                                    ],
                                    backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                    ],
                                    borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                    ],
                                    borderWidth: 1
                            }]
                    },
                    options: {
                    scales: {
                    yAxes: [{
                    ticks: {
                    beginAtZero: true
                    }
                    }]
                    }
                    }
            });
</script>
<script>
function removeReview(url, element) { 
    swal({
        title: "😧 هل انت متاكد?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then(function (willDelete) {
        if (willDelete) {
            $(element).html('<i class="fa fa-spin fa-spinner" ></i>');
            $.get(url, function(r){
                if (r.status == 1) {
                    $(element).parent().parent().remove();
                    success(r.message);
                }
            });
        } else {
        }
    });
    
    
}
</script>