@component('components.navbar', ['classes' => 'position-absolute'])
@endcomponent
<div class="banner d-flex align-items-center {{$bannerType}}" style="background-image: url('{{asset($imagePath)}}')">
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 my-4">
                    {{ $serviceCurator }}                             
                </div>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
</div>
