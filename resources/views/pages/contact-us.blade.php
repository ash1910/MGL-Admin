@extends('layouts.home')
@section('content')


<section class="section contact">
    <div class="container">
       
    <div class="row post-container" >
            <div class="col-lg-5 p-0 overflow-hidden wow fadeInLeft">
                <img src="{{ url(@$contact_img ?? '')}}" class="img-fluid post_img">
            </div>
            <div class="col-lg-7 post-text  wow fadeInRight">
                <div>
                <!-- <p class="text-primary  wow  fadeInLeft">Puhutaan kanssamme</p> -->
                    <h2 class="heading  wow  fadeInLeft">{{@$contact_title}}</h2>
                    
                    <form class="row">
                      <div class="col-md-6 wow fadeInLeft">
                          <input type="text" class="form-control" placeholder="Nimi" required>
                      </div>
                      <div class="col-md-6 wow  fadeInRight">
                          <input type="text" class="form-control" placeholder="Sähköposti">
                      </div>
                      <div class="col-md-6 wow fadeInLeft">
                          <input type="text" class="form-control" placeholder="Puhelin">
                      </div>
                      <div class="col-md-6 wow  fadeInRight">
                          <input type="text" class="form-control" placeholder="Aihe">
                      </div>

                      <div class="col-md-12 wow fadeInLeft">
                          <textarea class="form-control" placeholder="Viestisi"></textarea>
                      </div>
                      <div class="col-12 text-end mt-3 wow fadeInRight">
                          <button type="submit" class="btn btn-custom">Lähetä viesti</button>
                      </div>
                  </form>
                </div>
            </div>

        </div>
        
    </div>
</section>

@stop