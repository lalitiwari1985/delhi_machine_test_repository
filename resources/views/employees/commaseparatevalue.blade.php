@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Get Comma Separated Value</h1>
        <div class="mb-3">
            <label class="form-label">Enter the integer value</label>
            <input type="text" class="form-control" id="test_number" name="test_number">
            <strong id="comma_separated_number"></strong>
        </div>
    </div>

    <script>
        document.getElementById('test_number').addEventListener('input', function(event) {
            let inputValue = event.target.value;
            let formattedValue = formatNumber(inputValue);
            document.getElementById('comma_separated_number').textContent = formattedValue;
        });

        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
@endsection
