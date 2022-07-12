<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                2022
                @if(date('Y') != 2022)
                    - {{ date('Y') }}
                @endif
                © {{ config('app.name') }}
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->
