@extends('layouts.home')
@section('content')

<style>
  .gm-style .gm-style-iw-c {
    flex-direction: row-reverse;
    background-color: rgba(0, 182, 94, 1);
    color: white;
  }
  .gm-style .gm-style-iw-d {
    overflow: auto !important;
  }
  .gm-style .gm-style-iw-tc::after {
    background: rgba(0, 182, 94, 1);
  }
  .MapInfoWindow{
    padding: 15px 0;
  }
  .gm-style .gm-ui-hover-effect>span {
    background-color: #fff;
  }
  .modal-backdrop{
    display: none;
  }
  .overview_carousel .overview_carousel_item img {
    width: 100%;
    margin: 10px 0;
  }
  .map_details_content {
      position: relative;
  }
  .map_details_content .hero_content_search {
    width: 800px;
    position: absolute;
    left: 10px !important;
    top: -20px !important;
    z-index: 1000;
    height: 70px;
  }  
  #locationModalInsideMap{
    left: 0 !important;
  }
</style>

<!-- Include Bootstrap JS (make sure it's loaded after the Google Maps API script) -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->


<main id="primary" class="site-main">

    <!-- start: Page Headings -->
    <section class="page-headings page-headings-default">
    </section>
    <!-- end: Page Headings -->

    <!-- start: Haor Details -->
    <section class="haor-details" style="padding: 0;">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="details_content map_details_content">


            <div id="map" style="width: auto; height: calc(100vh - 220px);"></div>

            <!-- <div class="hero_content_search">
              <form action="#" class="hero_search">
                
                <select name="district" id="district_map">
                  <option selected value="">District</option>
                </select>
                <select name="thana" id="thana_map">
                  <option selected value="">Thana</option>
                </select>
                <input list="haor-list-map" type="text" name="haor" id="haor_map" placeholder="Type haor or wetland name" autocomplete="off">
                <datalist id="haor-list-map">
                </datalist>

                <button type="submit" id="haor_search_form_map"><i class="fa-light fa-search"></i>Show</button>
              </form>
            </div> -->

            <div class="hero_content_search" id="hero_content_search_inside_map">
              <form action="#" class="hero_search">
                
                <select name="district" id="district_map">
                  <option selected value="">District</option>
                </select>
                <select name="thana" id="thana_map">
                  <option selected value="">Thana</option>
                </select>
                <input list="haor-list-map" type="text" name="haor" id="haor_map" placeholder="Type haor or wetland name" autocomplete="off">
                <datalist id="haor-list-map">
                </datalist>

                <button type="submit" id="haor_search_form_map"><i class="fa-light fa-search"></i>Show</button>
              </form>
            </div>


          </div>
        </div>
      </div>
    </section>
    <!-- end: Haor Details -->

</main>

  <!-- Modal -->
  <div class="modal fade" id="locationModal" role="dialog">
    <div class="modal-dialog" style="width: 90%; max-width: 135vh;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: rgba(0, 182, 94, .2);">
          <h4 class="modal-title haorTitle"></h4>
          <button type="button" class="close closeBtn" data-dismiss="modal" style="font-size: 22px;">X</button>
        </div>
        <div class="modal-body" style="background-color: rgba(0, 182, 94, .1);">
          <div class="row">
             <div class="col-xs-12 col-md-12">

              <!-- start: Page Headings -->
              <section class="page-headings haor-bg-image" data-bg-image="">
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <div class="page_heading_content text-center">
                        <h2 class="title"></h2>
                        <div class="page_heading_info">
                          <span class="haor-area">>Area</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <!-- end: Page Headings -->

              <!-- start: Haor Overview -->
              <section class="haor-overview">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-lg-10">
                      <div class="haor_overview_content text-center">
                        <h5 class="subtitle">OVERVIEW</h5>
                        <div class="desc">
                          <p class="haor_overview_content_data"></p>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <!-- end: Haor Overview -->
              
              <!-- start: Haor Details -->
              <section class="haor-details">
                <div class="container">
                  <div class="row">
                    <div class="col-xl-7 col-lg-8">
                      <div class="details_content">
                      </div>
                    </div>
                    <div class="col-lg-4 offset-xl-1">
                      <aside class="main-sidebar">

                        <div class="sidebar_widget haor-information">
  
                        </div>

                        <div class="overview_carousel owl-carousel">
                        </div>

                      </aside>
                    </div>
                  </div>
                </div>
              </section>
              <!-- end: Haor Details -->

            </div>
          </div>
        </div>
        <div class="modal-footer" style="background-color: rgba(0, 182, 94, .2);">
          <button type="button" class="btn btn-default closeBtn" data-dismiss="modal" style="background-color: rgb(0, 182, 94); color: white;">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="locationModalInsideMap" role="dialog">
    <div class="modal-dialog" style="width: 90%; max-width: 135vh;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: rgba(0, 182, 94, .2);">
          <h4 class="modal-title haorTitle"></h4>
          <button type="button" class="close closeBtn" data-dismiss="modal" style="font-size: 22px;">X</button>
        </div>
        <div class="modal-body" style="background-color: rgba(0, 182, 94, .1);">
          <div class="row">
             <div class="col-xs-12 col-md-12">

              <!-- start: Page Headings -->
              <section class="page-headings haor-bg-image" data-bg-image="">
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <div class="page_heading_content text-center">
                        <h2 class="title"></h2>
                        <div class="page_heading_info">
                          <span class="haor-area">>Area</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <!-- end: Page Headings -->

              <!-- start: Haor Overview -->
              <section class="haor-overview">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-lg-10">
                      <div class="haor_overview_content text-center">
                        <h5 class="subtitle">OVERVIEW</h5>
                        <div class="desc">
                          <p class="haor_overview_content_data"></p>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <!-- end: Haor Overview -->
              
              <!-- start: Haor Details -->
              <section class="haor-details">
                <div class="container">
                  <div class="row">
                    <div class="col-xl-7 col-lg-8">
                      <div class="details_content">
                      </div>
                    </div>
                    <div class="col-lg-4 offset-xl-1">
                      <aside class="main-sidebar">

                        <div class="sidebar_widget haor-information">
  
                        </div>

                        <div class="overview_carousel owl-carousel">
                        </div>

                      </aside>
                    </div>
                  </div>
                </div>
              </section>
              <!-- end: Haor Details -->

            </div>
          </div>
        </div>
        <div class="modal-footer" style="background-color: rgba(0, 182, 94, .2);">
          <button type="button" class="btn btn-default closeBtn" data-dismiss="modal" style="background-color: rgb(0, 182, 94); color: white;">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <script src="https://maps.google.com/maps/api/js?key=AIzaSyCzlF9CQocsHCxPJmQYBYtFoQbyogtv9bE" type="text/javascript"></script>
<script type="text/javascript">
  let district_list = {};
  let upazila_list = {};
  let haor_list = [];
  let wetland_list = [];

  var locations = [
      {
          lat: 25.1400478,
          lng: 91.0857529,
          content: 'Tanguar Haor',
          address: 'Derai, Sunamganj',
          name: 'Undefined',
          title: 'Undefined',
          titleImage: 'https://amarhaor.com/uploads/images/33ef49c45a3cef3f398bbe6f86cb4515.jpeg',
          description: 'Tanguar Haor, located in the Dharmapasha and Tahirpur upazilas of Sunamganj District in Bangladesh, is a unique wetland ecosystem of national importance and has come into international focus. The area of Tanguar Haor including 46 villages within the haor is about 100 square kilometres of which 2,802.36 ha² is wetland.',
          about: 'Tanguar Haor, located in the Dharmapasha and Tahirpur upazilas of Sunamganj District in Bangladesh, is a unique wetland ecosystem of national importance and has come into international focus.',
          designations: 'Official name: Tanguar Haor<br> Designated: 10 June 2000<br> Reference no.1031',
          location: 'Dharmpasha - Tahirpur Road, 3030',
          area: 'The area of Tanguar Haor including 46 villages within the haor is about 100 square kilometres of which 2,802.36 ha² is wetland.',
      
      },
      {
          lat: 24.6732959,
          lng: 91.9544034,
          content: 'Hakaluki Haor',
          address: 'Fenchuganj, Sylhet',
          name: 'Undefined',
          title: 'Undefined',
          titleImage: 'https://amarhaor.com/uploads/images/f7e1d738e52b4dcda4959a22346d9dad.jpeg',
          description: 'Tanguar Haor, located in the Dharmapasha and Tahirpur upazilas of Sunamganj District in Bangladesh, is a unique wetland ecosystem of national importance and has come into international focus. The area of Tanguar Haor including 46 villages within the haor is about 100 square kilometres of which 2,802.36 ha² is wetland',
          about: 'Hakaluki Haor is a marsh wetland ecosystem of north-eastern Bangladesh. It is one of Bangladesh\'s largest and one of Asia\'s large marsh wetland resources.',
          designations: 'Official name: Hakaluki Haor<br> District: Sylhet.<br> Area. 21,500 Hectares.',
          location: 'Sylhet',
          area: '190,000 people live in the surrounding of the lake area The haor consists of 238 heels. In winter the haor is reduced to one fourth, the beels continue to retain water. The haor houses 525 species of plants, 416 species of birds, 140 species of wild animals, and 105 species of fish. In winter migratory birds swarm.Many tourists prefer to visit this place in winter. But the rainy season has its charm of vastness.',
      },
      {
          lat: 24.3733357,
          lng: 91.6308142,
          content: 'Hail Haor',
          address: 'Sreemangal, Maulvibazar',
          name: 'Undefined',
          title: 'Undefined',
          titleImage: 'https://amarhaor.com/uploads/images/d1fd3f46cb6f908f126ac180d8f003b8.jpeg',
          description: 'Hail Haor is situated in Moulvibazar District. It is one of the notable wetlands of Bangladesh. This is one of the safest abodes of many wild animals and migratory birds. Hail Haor Wildlife Sanctuary is a major wildlife sanctuary in Bangladesh. It is one of the most important wetlands in the Sylhet Basin for the resident and migratory waterfowls. It is also an important water source for the inhabitants living around when all other sources dry up during summer. The sanctuary is located in Moulvibazar District, in the northeast region of the country.',
          about: 'Hail Haor is a marsh wetland ecosystem of north-eastern Bangladesh. It is one of Bangladesh\'s largest and one of Asia\'s large marsh wetland resources.',
          designations: 'Official name: Hail Haor.<br> District: Moulvibazar Area.<br> 10,220 Hectares.',
          location: 'Moulvibazar.',
          area: 'The water of the wetland extends to cover approximately 14,000 ha (140 km2) during the monsoon and shrinks to 3,000 ha (30 km2) during the summer season. It is restricted to 130 beels and narrow canals. There are about 172000 people living in 62 villages around the wetland.',
      },
      {
          lat: 24.2775438,
          lng: 91.0978065,
          content: 'Borkha Khila bandh Haor',
          address: 'Austagram, Kishoreganj',
          name: 'Undefined',
          title: 'Undefined',
          titleImage: 'https://amarhaor.com/uploads/images/7c671207bee9e8511a0c5b6ab86a92ba.jpeg',
          description: 'In a country where one third of all area can be termed as wetlands, the haor basin is an internationally important wetland ecosystem, spread over Sunamganj, Habiganj, Moulvibazar districts and Sylhet Sadar Upazila, as well as Kishoreganj and Netrokona districts outside the core haor area.',
          about: 'Borkha Khila bandh Haor is  extraordinarily beautiful. The word Akashi means sky blue color and the word Haor means inundated water body that is created due to overflowing of nearby river.',
          designations: 'Official Name: Borkha Khila bandh Haor<br> District: Kishoreganj<br> Upazila: Austagram<br> Area: 3,480 Hectares.',
          location: 'Kishoreganj',
          area: '',
      },
      {
          lat: 24.1994314,
          lng: 91.173434,
          content: 'Akashi-Shapla Beel Haor',
          address: 'Nasirnagar, Brahmanbaria',
          name: 'Undefined',
          title: 'Undefined',
          titleImage: 'https://amarhaor.com/uploads/images/53cfe87449416cb5b33d7aa38729137a.jpeg',
          description: 'Akashi Haor (আকাশী হাওড়) is a small one, but extraordinarily beautiful. The word Akashi means sky blue color and the word Haor means inundated water body that is created due to overflowing of nearby river. So combining the two words it means sky blue colored water body. And interestingly the color of the water was really bluish. The clouds from the sky easily reflect on the pristine water from the Haor.',
          about: 'Akashi Haor (আকাশী হাওড়) is a small one, but extraordinarily beautiful.',
          designations: 'Official name: Ahashi Haor.<br> District: Brahmanbaria<br> Area. 3,148  Hectares.',
          location: 'Brahmanbaria',
          area: '',
      },
      {
          lat: 24.922982,
          lng: 91.318837,
          content: 'Dekar Haor',
          address: 'Dakshin, Sunamganj',
          name: 'Undefined',
          title: 'Undefined',
          titleImage: 'https://amarhaor.com/uploads/images/6536c3816cfd8a49dd0bfac5d22a0da0.jpeg',
          description: 'Dekhar Haor is one of the biggest haors of Sunamganj with four upazilas of Sunamganj Sadar, Dakshin Sunamganj, Doarabazar and Chatak. The viewing hour is called Boro Bhandar. In the coming rainy season, sometimes there will be turbulent water play, sometimes it will flow calmly. Haor\'s chest was decorated with a vast sky. Sunamganj city\'s entry point Ahsan Mara area will welcome the \'Muktijudda Bhaskrya\' part of the visit Haor tour. The photo was taken recently.',
          about: 'Dekar Haor is a small one, but extraordinarily beautiful. The word Akashi means sky blue color and the word Haor means inundated water body that is created due to overflowing of nearby river.     <li><strong>Official Name:</strong> Dekar Haor</li><li><strong>District:</strong> Sunamganj</li><li><strong>Upazila:</strong> Dakshin</li><li><strong>Area:</strong> 5,833 Hectares</li>',
          designations: 'Official name: Dekhar Haor<br> Designated: 10 June 2000<br> Reference no.1031',
          location: 'Dekhar Haor is one of the biggest haors of Sunamganj with four upazilas of Sunamganj Sadar, Dakshin Sunamganj, Doarabazar and Chatak.',
          area: 'Sunamganj city\'s entry point Ahsan Mara area will welcome the \'Muktijudda Bhaskrya\' part of the visit Haor tour.',
      },
      {
          lat: 24.45333,
          lng: 90.8236648,
          content: 'Bariar Haor',
          address: 'Nikli, Kishoreganj',
          name: 'Undefined',
          title: 'Undefined',
          titleImage: 'https://amarhaor.com/uploads/images/9d56a3308b011da1625c8004f704b402.jpeg',
          description: 'In a country where one third of all area can be termed as wetlands, the haor basin is an internationally important wetland ecosystem, spread over Sunamganj, Habiganj, Moulvibazar districts and Sylhet Sadar Upazila, as well as Kishoreganj and Netrokona districts outside the core haor area.',
          about: 'Nikli Haor if you want to have the pleasure of boating on the wide expanse of water. Nikoli Haor is located in Nikoli Upazila of Kishoreganj District.<br> Official name: Bariar Haor.<br> District: Kishoreganj<br> Area. 508  Hectares.',
          designations: 'Official name: Tanguar Haor<br> Designated: 10 June 2000<br> Reference no.1031',
          location: 'Kishoreganj',
          area: '',
      },
      {
          lat: 24.6561196,
          lng: 91.8234247,
          content: 'Kauadighi Haor',
          address: 'Balaganj, Sylhet',
          name: 'Undefined',
          title: 'Undefined',
          titleImage: 'https://amarhaor.com/uploads/images/a0de219406c0a0aea8357cb8b838ef00.jpeg',
          description: 'In a country where one third of all area can be termed as wetlands, the haor basin is an internationally important wetland ecosystem, spread over Sunamganj, Habiganj, Moulvibazar districts and Sylhet Sadar Upazila, as well as Kishoreganj and Netrokona districts outside the core haor area.',
          about: 'Kauadighi Haor is a small one, but extraordinarily beautiful. The word Akashi means sky blue color and the word Haor means inundated water body that is created due to overflowing of nearby river.<br> Official Name: Kauadighi Haor<br> District: Sylhet<br> Upazila: Balaganj<br> Area: 5  Hectares.',
          designations: '',
          location: 'Sylhet',
          area: 'The area of Kauadighi Haor including 46 villages within the haor is about 100 square kilometres of which 2,802.36 ha² is wetland.',
      },
      {
          lat: 24.4576117,
          lng: 88.9225823,
          content: 'Chalan Beel',
          address: 'Natore',
          name: 'Undefined',
          title: 'Undefined',
          titleImage: 'https://amarhaor.com/uploads/images/ce3edb42d2edffecea57ef3ca27d52f3.jpeg',
          description: 'Chalan Beel one of the largest inland depressions of marshy character and also one of the richest wetland areas of Bangladesh. It is the largest beel of the country and comprises a series of depressions interconnected by various channels to form more or less one continuous sheet of water in the rainy season when it covers an area of about 368 sq km.',
          about: 'Chalan Beel one of the largest inland depressions of marshy character and also one of the richest wetland areas of Bangladesh.',
          designations: 'Official name: Chalan Beel',
          location: 'Natore',
          area: 'The area of Chalan Beel covers an area of about 368 sq km.',
      },
      {
          lat: 25.4285481,
          lng: 89.060506,
          content: 'Ashurar Beel',
          address: 'Nawabganj, Dinajpur',
          name: 'Undefined',
          title: 'Undefined',
          titleImage: 'https://amarhaor.com/uploads/images/d43420e83307488fb2681946de2a1e8b.jpeg',
          description: 'Birampur in Dinajpur district and Ashura in Nawabganj are an immense gift of nature, a land of beauty. The total area of the bill is more than 857 acres, of which about 590 acres fall in Nawabganj upazila, the rest in Birampur upazila.',
          about: 'Birampur in Dinajpur district and Ashura in Nawabganj are an immense gift of nature, a land of beauty.',
          designations: 'Official name: Ashura Beel',
          location: 'Birampur in Dinajpur district and Ashura in Nawabganj',
          area: 'The area of Ashura Beel covers an area of about 857 acres.',
      },
      {
          lat: 23.566721,
          lng: 90.2359638,
          content: 'Arial Beel',
          address: 'Srinagar, Munshiganj',
          name: 'Undefined',
          title: 'Undefined',
          titleImage: 'https://amarhaor.com/uploads/images/856a732293056dba4bb6544901288d34.jpeg',
          description: 'Arial Beel is the third largest wetland in Bangladesh covering an area of 136 sq. km. It is situated in Srinagar Upazila of Munshiganj District. The beel consists of many small ponds and canals.',
          about: 'Arial Beel is the third largest wetland in Bangladesh covering an area of 136 sq. km. It is situated in Srinagar Upazila of Munshiganj District.',
          designations: 'Official name: Arial Beel',
          location: 'Srinagar, Munshiganj',
          area: 'The area of Arial Beel covers an area of about 136 sq. km.',
      },
      {
          lat: 22.9477214,
          lng: 89.8282311,
          content: 'Borni baor',
          address: 'Tungi Para, Gopalganj ',
          name: 'Undefined',
          title: 'Undefined',
          titleImage: 'https://amarhaor.com/uploads/images/eaea583b0b8579996d724cdf602ffe52.jpeg',
          description: 'Borni baor is one of the largest wetland in Bangladesh covering a large area. It is situated in Tungi Para Upazila of Gopalganj District. The baor consists of many small ponds and canals. This view of the unique beauty of Borni Baur, full of traditional natural resources of Tungipara Upazila.',
          about: 'Borni baor one of the largest inland depressions of marshy character and also one of the richest wetland areas of Bangladesh.',
          designations: 'Official name: Borni baor',
          location: 'Tungi Para, Gopalganj',
          area: '',
      },
      {
          lat: 22.6926423,
          lng: 92.0279957,
          content: 'Kaptai Lake',
          address: 'Rangamati, Chittagong',
          name: 'Undefined',
          title: 'Undefined',
          titleImage: 'https://amarhaor.com/uploads/images/8b8df641014d613a9083c121a481fb64.jpeg',
          description: 'Kaptai Lake is the largest man made lake in Bangladesh.[1] It is located in the Kaptai Upazila under Rangamati District of Chittagong Division. The lake was created as a result of building the Kaptai Dam on the Karnaphuli River, as part of the Karnaphuli Hydro-electric project. Kaptai Lake\'s average depth is 100 feet (30 m) and maximum depth is 490 feet (150 m).',
          about: 'Kaptai Lake is the largest man made lake in Bangladesh.',
          designations: 'Official name: Kaptai Lake',
          location: 'Kaptai Upazila under Rangamati District of Chittagong Division',
          area: 'The area of Kaptai Lake covers an area of about 54,000 acres.',
      },
      {
          lat: 22.2359894,
          lng: 91.7860378,
          content: 'Patenga',
          address: 'Patenga, Chattogram',
          name: 'Undefined',
          title: 'Undefined',
          titleImage: 'https://amarhaor.com/uploads/images/40508223aeca52acdfd22097fc4eed8c.jpeg',
          description: 'Patenga is a sea beach of the Bay of Bengal, located 14 kilometres (8.7 mi) south from the port city of Chattogram, Bangladesh. It is near to the mouth of the Karnaphuli River. Patenga is a popular and renowned tourist spot. The beach is very close to the Bangladesh Naval Academy of the Bangladesh Navy and Shah Amanat International Airport.',
          about: 'Patenga is a sea beach of the Bay of Bengal, located 14 kilometres (8.7 mi) south from the port city of Chattogram, Bangladesh.',
          designations: 'Official name: Patenga Sea Beach',
          location: 'Patenga , Chattogram',
          area: '',
      },
      {
          lat: 22.610714,
          lng: 91.6100017,
          content: 'Sitakunda Sea Beach',
          address: 'Sitakunda, Chattogram',
          name: 'Undefined',
          title: 'Undefined',
          titleImage: 'https://amarhaor.com/uploads/images/f6240b5bdae6e436d3937e48c65b5fde.webp',
          description: 'Guliakhali Sea Beach is named as Sitakunda Sea Beach also is located in Sitakunda upazila of Chattogram district. We have described about Guliakhali in our top 15 sea beaches in Bangladesh post. A lot of you ask to write a detailed post about Guliakhali Sea Beach. To the locals this beach is known as Muradpur Beach.',
          about: 'Guliakhali Sea Beach is named as Sitakunda Sea Beach also is located in Sitakunda upazila of Chattogram district.',
          designations: 'Official name: Guliakhali Sea Beach',
          location: '',
          area: 'Sitakunda, Chattogram',
      },
      {
          lat: 21.4367316,
          lng: 91.951661,
          content: 'Cox\'s Bazar',
          address: 'Cox\'s Bazar',
          name: 'Undefined',
          title: 'Undefined',
          titleImage: 'https://amarhaor.com/uploads/images/a478e6e48c130c5130761edcb680c9b0.jpeg',
          description: 'Cox\'s Bazar is a city, fishing port, tourism centre, and district headquarters in southeastern Bangladesh. The iconic Cox\'s Bazar Beach, one of the most popular tourist attractions in Bangladesh.',
          about: 'Cox\'s Bazar is a city, fishing port, tourism centre, and district headquarters in southeastern Bangladesh.',
          designations: 'Official name: Cox\'s Bazar',
          location: 'Cox\'s Bazar',
          area: 'The city covers an area of 23.4 km2',
      },
      {
          lat: 24.3590529,
          lng: 91.6772462,
          content: 'Baikka Beel',
          address: 'Moulavi Bazar. Sreemangal',
          name: 'Undefined',
          title: 'Undefined',
          titleImage: 'https://amarhaor.com/uploads/images/e69fe4d6a558868bed0f15e91528573c.jpeg',
          description: 'Baikka Beel is a 100 ha wetland sanctuary located in Hail Haor a large wetland seasonally extending from 3,000-12,000 ha in north-east Bangladesh.',
          about: 'Baikka Beel is a 100 ha wetland sanctuary located in Hail Haor',
          designations: 'Official name: Baikka Beel',
          location: 'Moulavi Bazar',
          area: 'The area of Baikka Beel covers an area of about 100 ha ',
      },
      {
          lat: 21.8354597,
          lng: 90.093036,
          content: 'Kuakata Sea Beach',
          address: 'Kuakata, Patuakhali',
          name: 'Undefined',
          title: 'Undefined',
          titleImage: 'https://amarhaor.com/uploads/images/e1233748c6bb455c1dbd31a3adc24a96.jpeg',
          description: 'Kuakata Beach is a beach situated in Kuakata, Patuakhali District, Bangladesh. Its length is 18 km. It is known as "Sagor Konya" (Daughter of Sea). It is one of top tourist attraction in Bangladesh but due to pollution, uncontrolled tourism and other issues Kuakata Beach is losing its beauty.',
          about: 'Kuakata is one of the attractive sea beaches in the world. It was a division of the larger Sundarbans forest. The Kuakata beach is 30 km long and 6 km wide.',
          designations: 'Official name: Kuakata Sea Beach',
          location: 'Kuakata, Patuakhali ',
          area: 'Its length is 18 km',
      },
      // Add more locations...
  ];

  var haor_locations = [];
  // Initialize the map
  const map = new google.maps.Map(document.getElementById('map'), {
      center: { lat: 23.8941228, lng: 90.3874321 },
      zoom: 7,
  });
  let markers = []; // Array to hold marker objects

  // Listen for fullscreen changes
  // document.addEventListener("fullscreenchange", () => {
  //   const overlay = document.getElementById("hero_content_search_inside_map");

  //   if (document.fullscreenElement) {
  //     // If the map is in fullscreen mode, show the overlay
  //     //overlay.style.display = "block";
  //   } else {
  //     // Hide the overlay when exiting fullscreen
  //     //overlay.style.display = "none";
  //   }
  // });

// Create markers and info windows
  const showMarker = function(haor_locations){

    // Remove all existing markers
    clearMarkers();

    for (const [i, loc] of haor_locations.entries()) {
      //console.log(loc);
      const marker = new google.maps.Marker({
          position: { lat: Number(loc.latitude), lng: Number(loc.longitude) },
          map: map,
          icon: {
              url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png" // Replace with your color URL
          }
      });

      markers.push(marker);

      let markerAddress = loc.upazila ? `${loc.upazila}, ` : "";
      markerAddress = loc.district ? `${markerAddress}${loc.district}` : "";

      const infowindow = new google.maps.InfoWindow({
          content: `<div class="MapInfoWindow" onClick={showModal('${loc.id}')}><strong>${loc.name}</strong><br>${markerAddress}</div>`,
      });

      // Delayed opening of info window (adjust the timeout as needed)
      setTimeout(() => {
          infowindow.open(map, marker);
      }, 2000); // 2 seconds delay

      // Add a click event listener to open the info window when the marker is clicked
      marker.addListener('click', () => {
          infowindow.open(map, marker);
          showModal(loc.id);
      });

    }
  }

  // Function to remove all markers from the map
  function clearMarkers() {
      for (let i = 0; i < markers.length; i++) {
          markers[i].setMap(null); // Remove marker from the map
      }
      markers = []; // Clear the array
  }




  window.onload = function(){

    $.get('/api/haor_list_for_map', function(response) {
      // Log the response to the console
      //console.log("Response: "+response);
      haor_locations = [];
      if( response.district_items ){
        district_list = JSON.stringify(response.district_items);
      }
      if( response.upazila_items ){
        upazila_list = JSON.stringify(response.upazila_items);
      }
      if( response.haor_items ){
        haor_list = JSON.stringify(response.haor_items);
        haor_locations = [...response.haor_items];
      }
      if( response.wetland_items ){
        wetland_list = JSON.stringify(response.wetland_items);

        let wetland_items = response.wetland_items;
        wetland_items = wetland_items.map(item => {
          return { ...item, id: "w" + item.id };
        });

        haor_locations = [...haor_locations, ...wetland_items];
      }
      showMarker(haor_locations);
      loadFilter();
      //console.log("Response: " + haor_locations);
    });

    $(document).on("change", "#district_map",function(e){
      e.preventDefault();
      $("#thana_map").empty();
      $("#haor-list-map").empty();
      $("#haor_map").val("");

      let dis = $(this).val();
      
      if(upazila_list){
        let upazilas = JSON.parse(upazila_list);
        var upazila_list_by_dis = upazilas.filter(obj => obj.district_id == dis);
        options = "<option selected value=''>Thana</option>";
        upazila_list_by_dis.forEach(function(item) {
          options += `<option value="${item.id}">${item.name}</option>`;
        });
        $("#thana_map").html(options).niceSelect('update');
      }

      if(haor_list){
        var haor_list_by_dis = JSON.parse(haor_list);
        if(dis){
          haor_list_by_dis = haor_list_by_dis.filter(obj => obj.district_id == dis);
        }
        else{
          if(wetland_list){
            var wetland_list_by_dis = JSON.parse(wetland_list);
            haor_list_by_dis = [...haor_list_by_dis, ...wetland_list_by_dis];
          }
        }
        options = "";
        haor_list_by_dis.forEach(function(item) {
          options += `<option data-id="${item.id}">${item.name}</option>`;
        });
        $("#haor-list-map").html(options);
      }
    });

    $(document).on("change", "#thana_map",function(e){
      e.preventDefault();
      $("#haor-list-map").empty();
      $("#haor_map").val("");

      let thana = $(this).val();
      
      if(haor_list){
        var haor_list_by_upa = JSON.parse(haor_list);
        haor_list_by_upa = haor_list_by_upa.filter(obj => obj.upazila_id == thana);
        //console.log(haor_list_by_upa)
        options = "";
        haor_list_by_upa.forEach(function(item) {
          options += `<option data-id="${item.id}">${item.name}</option>`;
        });
        $("#haor-list-map").html(options);
      }
      //console.log(thana);
    });

    $(document).on("click", "#haor_search_form_map",function(e){
      e.preventDefault();

      let haor = $("#haor_map").val();
      let thana = $("#thana_map").val();
      let district = $("#district_map").val();
      
      if(haor && haor_list){
        var haor_list_by_upa = JSON.parse(haor_list);
        var haor_item = haor_list_by_upa.find(obj => obj.name == haor);
        if(haor_item){
          //location.href = "/haor-detail/"+haor_item.id;
          //console.log(haor_item);
          let haor_locations_items = [];
          haor_locations_items.push(haor_item);
          showMarker(haor_locations_items);
          map.setZoom(10);
        }
        else{
          if(wetland_list){
            var wetland_list_by_dis = JSON.parse(wetland_list);
            let wetland_item = wetland_list_by_dis.find(obj => obj.name == haor);
            if(wetland_item){
              let haor_locations_items = [];
              haor_locations_items.push(wetland_item);
              showMarker(haor_locations_items);
              map.setZoom(10);
            }
            else{
              alert("It's not available");
            }
          }
        }
      }
      else if(thana){
        //location.href = "/upazila/"+thana;
        var haor_list_by_upa = JSON.parse(haor_list);
        const haor_item = haor_list_by_upa.filter(obj => obj.upazila_id == thana);
        if(haor_item){
          //console.log(haor_item);
          let haor_locations_items = [];
          //haor_locations_items.concat(haor_item);
          showMarker(haor_item);
          map.setZoom(10);
        }
        else{
          alert("It's not available");
        }
        //console.log(thana)
      }
      else if(district){
        //location.href = "/district/"+district;
        var haor_list_by_upa = JSON.parse(haor_list);
        const haor_item = haor_list_by_upa.filter(obj => obj.district_id == district);
        if(haor_item){
          //console.log(haor_item);
          let haor_locations_items = [];
          //haor_locations_items.concat(haor_item);
          showMarker(haor_item);
          map.setZoom(10);
        }
        else{
          alert("It's not available");
        }
      }
      else{
        alert("Please type a Haor name");
      }
      //console.log(haor);
    });

  }

  let loadFilter = function(haor_id){
      // Update Filter Content
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(document.getElementById("hero_content_search_inside_map"));
      //map.appendChild(document.getElementById("hero_content_search_inside_map"));

      if(district_list){
        let districts = JSON.parse(district_list);

        options = "<option selected value=''>District</option>";

        for (const [id, name] of Object.entries(districts)) {
          options += `<option value="${id}">${name}</option>`;
        }

        $("#district_map").html(options).niceSelect('update');
      }
      if(haor_list){
        var haor_list_by_dis = JSON.parse(haor_list);
        var wetland_list_by_dis = JSON.parse(wetland_list);
        options = "";
        haor_list_by_dis.forEach(function(item) {
          options += `<option data-id="${item.id}">${item.name}</option>`;
        });
        wetland_list_by_dis.forEach(function(item) {
          options += `<option data-id="${item.id}">${item.name}</option>`;
        });
        $("#haor-list-map").html(options);
      }
  }



  const showModal = function(haor_id){
      // Update modal content
      console.log(haor_id);
      $.get(`/api/map-haor-detail/${haor_id}`, function(response) {
        openModal(response);
      });
  }

  
  const openModal = function(haor_detail){
      // Update modal content
      //var loc = locations[i];
      const site_url = "https://amarhaor.com/";

      var isFullScreen = document.fullScreen ||
        document.mozFullScreen ||
        document.webkitIsFullScreen;

      if (isFullScreen) {
          //console.log('fullScreen!');
          $('#locationModalInsideMap .haorTitle').html(haor_detail.name);
          $('#locationModalInsideMap .details_content').html(haor_detail.description);
          $('#locationModalInsideMap .haor-information').html(haor_detail.about);
          $('#locationModalInsideMap .haor_overview_content_data').html(haor_detail.overview);
          $('#locationModalInsideMap .haor-area').html("Area " + haor_detail.area);
          $('#locationModalInsideMap .title').html(haor_detail.name);
          $('#locationModalInsideMap .haor-bg-image').attr("data-bg-image", site_url + haor_detail.header_img);
          $('#locationModalInsideMap .haor-bg-image').css("background-image", `url(${site_url}${haor_detail.header_img})`);  

          var overview_carousel = "";
          for (const [i, item] of haor_detail.gallery_items.entries()) {
            overview_carousel += `<div class="overview_carousel_item">
                                    <img src="${site_url}${item.image}" alt="">
                                  </div>`;
          }
          $('#locationModalInsideMap .overview_carousel').html(overview_carousel);

          map.controls[google.maps.ControlPosition.TOP_LEFT].push(document.getElementById("locationModalInsideMap"));
          $('#locationModalInsideMap').modal('show');
      } else {
          //console.log('NO fullScreen!');

          $('#locationModal .haorTitle').html(haor_detail.name);
          $('#locationModal .details_content').html(haor_detail.description);
          $('#locationModal .haor-information').html(haor_detail.about);
          $('#locationModal .haor_overview_content_data').html(haor_detail.overview);
          $('#locationModal .haor-area').html("Area " + haor_detail.area);
          $('#locationModal .title').html(haor_detail.name);
          $('#locationModal .haor-bg-image').attr("data-bg-image", site_url + haor_detail.header_img);
          $('#locationModal .haor-bg-image').css("background-image", `url(${site_url}${haor_detail.header_img})`);  

          var overview_carousel = "";
          for (const [i, item] of haor_detail.gallery_items.entries()) {
            overview_carousel += `<div class="overview_carousel_item">
                                    <img src="${site_url}${item.image}" alt="">
                                  </div>`;
          }
          $('#locationModal .overview_carousel').html(overview_carousel);

          $('#locationModal').modal('show');
      }
      
  }


  </script>
          
@stop