@extends('frontend.layouts.app')
@section('content')
<style>
/* .storiesWrapper {
  padding: 12px;
  max-width: 500px;
  margin: 0 auto;
}
.disclaimer {
  display: block;
  text-decoration: none !important;
  color: #333;
  line-height: 1.5em;
  background: #ffffd2;
  border-radius: 3px;
  margin: 12px 12px 0;
  padding: 12px 12px 12px 74px;
  font-size: 13px;
  max-width: 500px;
  overflow: hidden;
  min-height: 50px;
}
.disclaimer img {
  float: left;
  margin-right: 12px;
  width: 50px;
  position: absolute;
  margin-left: -62px;
}
/* .disclaimer a {
  color: inherit !important;
  border: 0;
}
.disclaimer p {
  margin: 0;
}
.disclaimer p + p {
  margin-top: 1.25em;
} */
.skin {
  text-transform: uppercase;
  white-space: nowrap;
  overflow: hidden;
  font-weight: bold;
  position: absolute;
  z-index: 10;
  left: 0;
  right: 0;
  bottom: 0;
  background: #fff;
  font-size: 16px;
  padding: 12px;
  color: #fff;
  background: #333;
}
.skin select {
  background: #fff;
  font-size: inherit;
  text-transform: none;
  max-width: 30%;
}
@media (min-width: 524px) {
  .disclaimer {
    margin: 12px auto;
  }
} 

   .stories.carousel .story:first-child > .item-link > .item-preview img {
   
      border: 0px;
   }
   .stories.carousel .story:first-child > .item-link > .item-preview  {
   
      background:unset;    border: 1px dashed red;
}
    </style>
<link rel="stylesheet" href="https://unpkg.com/zuck.js/dist/zuck.css" />
    <link rel="stylesheet" href="https://unpkg.com/zuck.js/dist/skins/snapgram.css" />
<div class="main_right col-12 col-lg-6 col-md-6">
   <div class="row">
      <div class="col-lg-12 home_main_pos">
         <div id="app">
            <div class="reels_section">
               <ul class="float-start p-0 ml-0 me-3">
                  <li class="active text-center"><a href="#"  data-bs-toggle="modal" data-bs-target="#AddStoriesModal"><span>+</span></a><p style="margin: 10px 0px 0px; font-weight: 500;color: #bdbdbd;">Create</p></li>
               </ul>
                  <div id="stories" class="storiesWrapper"></div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="top_right_side col-12 col-lg-3  col-md-3">
   @include('frontend.partials.right-sidebar')  
</div>
@endsection
@section('modal')
    @include('frontend.modals.upload-stories-form')
@endsection


@section('footer')


<script src="https://unpkg.com/zuck.js/dist/zuck.js"></script>
<script>
  // const timestamp = function () {
  //                       let timeIndex = 1678166046264 / 1000;
  //                       return timeIndex;
  //                       let random = Math.floor(Math.random() * 1000);
  //                       return Math.round(timeIndex - random);
  //                     };


const changeSkin = function (skin) {
  location.href = location.href.split('#')[0].split('?')[0] + '?skin=' + skin;
};
const getCurrentSkin = function () {
  const header = document.getElementById('header');
  let skin = location.href.split('skin=')[1];
  if (!skin) {
    skin = 'Snapgram';
  }
  if (skin.indexOf('#') !== -1) {
    skin = skin.split('#')[0];
  }
  const skins = {
    Snapgram: {
      avatars: true,
      list: false,
      autoFullScreen: false,
      cubeEffect: true,
      paginationArrows: false
    },
    VemDeZAP: {
      avatars: false,
      list: true,
      autoFullScreen: false,
      cubeEffect: false,
      paginationArrows: true
    },
    FaceSnap: {
      avatars: true,
      list: false,
      autoFullScreen: true,
      cubeEffect: false,
      paginationArrows: true
    },
    Snapssenger: {
      avatars: false,
      list: false,
      autoFullScreen: false,
      cubeEffect: false,
      paginationArrows: false
    }
  };
  const el = document.querySelectorAll('#skin option');
  const total = el.length;
  for (let i = 0; i < total; i++) {
    const what = skin == el[i].value;
    if (what) {
      el[i].setAttribute('selected', 'selected');
      header.innerHTML = skin;
      header.className = skin;
    } else {
      el[i].removeAttribute('selected');
    }
  }
  return {
    name: skin,
    params: skins[skin]
  };
};
</script>
    <script>
      

   
    function getUserStories(){
        $.ajax({
            type: 'get',
            url: '{{ env("APP_URL") }}/api/v1/get-all-statu-users/47',
            dataType: "json",
            mimeType: "multipart/form-data",
            cache: false,
            processData:false,
            contentType: false,

            success: function (data, textStatus, xhr) {
                console.log(data);
                var currentSkin = getCurrentSkin();
                var stories = window.Zuck(document.querySelector('#stories'), {
                  backNative: true,
                  previousTap: true,
                  skin: currentSkin['name'],
                  autoFullScreen: currentSkin['params']['autoFullScreen'],
                  avatars: currentSkin['params']['avatars'],
                  paginationArrows: currentSkin['params']['paginationArrows'],
                  list: currentSkin['params']['list'],
                  cubeEffect: currentSkin['params']['cubeEffect'],
                  localStorage: true,
                  stories: data.data
                });
                if(data.success === true){
                    dsldFlashNotification('success', data.message);
                }else{
                    dsldFlashNotification('error', errorResponseMessage(data.message));
                }
                
            }
        })
    }

    $('document').ready(function(){
      getUserStories();
    });
    
    </script>
@endsection