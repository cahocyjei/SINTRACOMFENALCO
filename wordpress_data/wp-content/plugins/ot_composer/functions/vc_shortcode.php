<?php 

//Custom Heading
if(function_exists('vc_map')){

   vc_map( array(

   "name"      => __("OT Heading", 'eleos'),

   "base"      => "heading",

   "class"     => "",

   "icon" => "icon-st",

   "category"  => 'Eleos Element',

   "params"    => array(

      array(

         "type"      => "textarea",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Text", 'eleos'),

         "param_name"=> "text",

         "value"     => "",

         "description" => __("Add Text", 'eleos')

      ),
      array(

        "type" => "dropdown",

        "heading" => __('Element Tag', 'eleos'),

        "param_name" => "tag",

        "value" => array(
                     __('Select Tag', 'eleos') => '',

                     __('h1', 'eleos') => 'h1',

                     __('h2', 'eleos') => 'h2',

                     __('h3', 'eleos') => 'h3',  

                     __('h4', 'eleos') => 'h4',

                     __('h5', 'eleos') => 'h5',

                     __('h6', 'eleos') => 'h6',  

                     __('p', 'eleos')  => 'p',

                     __('div', 'eleos') => 'div',
                    ),

        "description" => __("Section Element Tag", 'eleos'),      

      ),
      array(

        "type" => "dropdown",

        "heading" => __('Text Align', 'eleos'),

        "param_name" => "align",

        "value" => array( 

                     __('Select Align', 'eleos') => '',  

                     __('left', 'eleos') => 'left',

                     __('right', 'eleos') => 'right',  

                     __('center', 'eleos') => 'center',

                     __('justify', 'eleos') => 'justify',
                     
                    ),

        "description" => __("Section Overlay", 'eleos'),      

      ),
      array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Font Size", 'eleos'),

         "param_name"=> "size",

         "value"     => "",

         "description" => __("Font Size", 'eleos')

      ),
      array(

         "type"      => "colorpicker",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Color", 'eleos'),

         "param_name"=> "color",

         "value"     => "",

         "description" => __("Color", 'eleos')

      ),
      array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Margin Top", 'eleos'),

         "param_name"=> "top",

         "value"     => "",

         "description" => __("Add margin top of heading", 'eleos')

      ),
      array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Margin Bottom", 'eleos'),

         "param_name"=> "bot",

         "value"     => "",

         "description" => __("Add margin bottom of heading", 'eleos')

      ),
      
      array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Class Extra", 'eleos'),

         "param_name"=> "class",

         "value"     => "",

         "description" => __("Class extra for style", 'eleos')

      ),
    )));

}

//Slider text (use)
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT Home slide", 'eleos'),
   "base"      => "home_slider_text",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Eleos Element',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number show",
         "param_name" => "number",
         "value" => "",
         "description" => __("Enter the number show", 'eleos')
      ), 
      array(
         "type" => "vc_link",
         "heading" => __("Button link", 'eleos'),
         "param_name" => "linkbox",
         "description" => __("Add link", 'eleos')
      ),
    )));
}

//Home Parallax
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT Home Parallax", 'eleos'),
   "base"      => "home_parallax",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Eleos Element',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Title",
         "param_name" => "title",
         "value" => "",
         "description" => __("Enter the title", 'eleos')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Title Shadow",
         "param_name" => "titlesha",
         "value" => "",
         "description" => __("Enter the shadow title ", 'eleos')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Sub Title",
         "param_name" => "subtitle",
         "value" => "",
         "description" => __("Enter the subtitle", 'eleos')
      ), 
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Image",
         "param_name" => "image",
         "value" => "",
         "description" => __("Upload image", 'eleos')
      ), 
      array(
         "type" => "vc_link",
         "heading" => __("Button link", 'eleos'),
         "param_name" => "linkbox",
         "description" => __("Add link", 'eleos')
      ),
    )));
}

//Home Youtube
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT Home Youtube Video", 'eleos'),
   "base"      => "home_youtube",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Eleos Element',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Title",
         "param_name" => "title",
         "value" => "",
         "description" => __("Enter the title", 'eleos')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Title Shadow",
         "param_name" => "titlesha",
         "value" => "",
         "description" => __("Enter the shadow title ", 'eleos')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Sub Title",
         "param_name" => "subtitle",
         "value" => "",
         "description" => __("Enter the sub title", 'eleos')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Enter Your ID YouTube Video", 'eleos'),
         "param_name" => "video_link",
         "value" => "",
         "description" => __("Your ID YouTube Video, Example: <code>UmxfJKt2hfA</code> https://www.youtube.com/watch?v=<code>UmxfJKt2hfA</code> or https://youtu.be/<code>UmxfJKt2hfA</code>, Please only Your ID Video and not all link video.", 'eleos')
      ), 
      array(
         "type" => "vc_link",
         "heading" => __("Button link", 'eleos'),
         "param_name" => "linkbox",
         "description" => __("Add link", 'eleos')
      ),
    )));
}

//Video Home
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT Video Home", 'eleos'),
   "base"      => "videohome",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Eleos Element',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Title",
         "param_name" => "title",
         "value" => "",
         "description" => __("Enter the title", 'eleos')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Title Shadow",
         "param_name" => "titlesha",
         "value" => "",
         "description" => __("Enter the shadow title", 'eleos')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Sub Title",
         "param_name" => "subtitle",
         "value" => "",
         "description" => __("Enter the subtitle", 'eleos')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link video",
         "param_name" => "linkvd1",
         "value" => "",
         "description" => __("Add link video .webm . Ex: videos/video.webm", 'eleos')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link video",
         "param_name" => "linkvd2",
         "value" => "",
         "description" => __("Add link video .mp4 . Ex: videos/video.mp4", 'eleos')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link video",
         "param_name" => "linkvd3",
         "value" => "",
         "description" => __("Add link video .ogg .Ex: videos/video.ogg", 'eleos')
      ), 
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Image",
         "param_name" => "image",
         "value" => "",
         "description" => __("Upload image poster", 'eleos')
      ), 
      array(
         "type" => "vc_link",
         "heading" => __("Button link", 'eleos'),
         "param_name" => "linkbox",
         "description" => __("Add link", 'eleos')
      ),
    )));
}

//Section Title Shadow
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT  Section Title Shadow", 'eleos'),
   "base"      => "sectit",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Eleos Element',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Title",
         "param_name" => "title",
         "value" => "",
         "description" => __("Enter the title", 'eleos')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Shadow Title",
         "param_name" => "shtit",
         "value" => "",
         "description" => __("Enter the shadow title", 'eleos')
      ), 
      
      
       
    )));
}

//Section Title
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT  Section Title", 'eleos'),
   "base"      => "sectit2",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Eleos Element',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Title",
         "param_name" => "title",
         "value" => "",
         "description" => __("Enter the title", 'eleos')
      ), 
      
      
       
    )));
}

//Agency
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT Agency", 'eleos'),
   "base"      => "agency",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Eleos Element',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number show",
         "param_name" => "number",
         "value" => "",
         "description" => __("Enter the number show", 'eleos')
      ), 
      
      
       
    )));
}

//Our Team (use eleos)
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __("OT Our Team", 'eleos'),
   "base" => "team",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Eleos Element',
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Photo Member",
         "param_name" => "photo",
         "value" => "",
         "description" => __("Avarta of member, Recomended Size: 500 x 333", 'eleos')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Name", 'eleos'),
         "param_name" => "name",
         "value" => "",
         "description" => __("Member's Name", 'eleos')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Job", 'eleos'),
         "param_name" => "job",
         "value" => "",
         "description" => __("Member's job.", 'eleos')
      ),
      array(
         'type' => 'iconpicker',
         'heading' => __( 'Icon1', 'eleos' ),
         'param_name' => 'icon1',
         'value' => 'fa fa-info-circle',
         'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'iconsPerPage' => 4000, // default 100, how many icons per/page to display
         ),         
         'description' => __( 'Select icon from library.', 'eleos' ),
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Url 1",
         "param_name"=> "url1",
         "value"     => "",
         "description" => __("Url.", 'eleos')
      ),
     array(
         'type' => 'iconpicker',
         'heading' => __( 'Icon2', 'eleos' ),
         'param_name' => 'icon2',
         'value' => 'fa fa-info-circle',
         'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'iconsPerPage' => 4000, // default 100, how many icons per/page to display
         ),         
         'description' => __( 'Select icon from library.', 'eleos' ),
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Url 2",
         "param_name"=> "url2",
         "value"     => "",
         "description" => __("Url.", 'eleos')
      ),
     array(
         'type' => 'iconpicker',
         'heading' => __( 'Icon3', 'eleos' ),
         'param_name' => 'icon3',
         'value' => 'fa fa-info-circle',
         'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'iconsPerPage' => 4000, // default 100, how many icons per/page to display
         ),         
         'description' => __( 'Select icon from library.', 'eleos' ),
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Url 3",
         "param_name"=> "url3",
         "value"     => "",
         "description" => __("Url.", 'eleos')
      ),
     array(
         'type' => 'iconpicker',
         'heading' => __( 'Icon4', 'eleos' ),
         'param_name' => 'icon4',
         'value' => 'fa fa-info-circle',
         'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'iconsPerPage' => 4000, // default 100, how many icons per/page to display
         ),         
         'description' => __( 'Select icon from library.', 'eleos' ),
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Url 4",
         "param_name"=> "url4",
         "value"     => "",
         "description" => __("Url.", 'eleos')
      ),
    )));
}

//Service
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT Service", 'eleos'),
   "base"      => "service",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Eleos Element',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number show",
         "param_name" => "number",
         "value" => "",
         "description" => __("Enter the number show", 'eleos')
      ), 
    )));
}

//Slide show
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT Slide Show", 'eleos'),
   "base"      => "slishow",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Eleos Element',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number show",
         "param_name" => "number",
         "value" => "",
         "description" => __("Enter the number show", 'eleos')
      ),       
    )));
}

//Portfolio
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT Portfolio", 'eleos'),
   "base"      => "portfolio",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Eleos Element',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Text show all",
         "param_name" => "all",
         "value" => "",
         "description" => __("Enter text show all", 'eleos')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number show",
         "param_name" => "number",
         "value" => "",
         "description" => __("Enter the number show", 'eleos')
      ), 
    )));
}

//Testimonial
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT Testimonial slider", 'eleos'),
   "base"      => "testislider",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Eleos Element',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number show",
         "param_name" => "number",
         "value" => "",
         "description" => __("Enter the number show", 'eleos')
      ), 
    )));
}

//Our fact
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT  Our fact", 'eleos'),
   "base"      => "fact",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Eleos Element',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Number",
         "param_name" => "number",
         "value" => "",
         "description" => __("Enter the number", 'eleos')
      ), 
      array(
         'type' => 'iconpicker',
         'heading' => __( 'icon', 'eleos' ),
         'param_name' => 'icon',
         'value' => 'fa fa-info-circle',
         'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'iconsPerPage' => 4000, // default 100, how many icons per/page to display
         ),         
         'description' => __( 'Select icon from library.', 'eleos' ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Title",
         "param_name" => "title",
         "value" => "",
         "description" => __("Enter the title", 'eleos')
      ), 
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => "Content",
         "param_name" => "content",
         "value" => "",
         "description" => __("Enter the content", 'eleos')
      ),
    )));
}

//Image Project
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT Image Project", 'eleos'),
   "base"      => "imgproj",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Eleos Element',
   "params"    => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Image",
         "param_name" => "image",
         "value" => "",
         "description" => __("Upload image", 'eleos')
      ), 
    )));
}

//Video player
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT Video Player", 'eleos'),
   "base"      => "video",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Eleos Element',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link video",
         "param_name" => "video",
         "value" => "",
         "description" => __("Add link video. Ex: http://player.vimeo.com/video/152749162", 'eleos')
      ), 
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Image",
         "param_name" => "image",
         "value" => "",
         "description" => __("Upload image poster", 'eleos')
      ), 
    )));
}

//Clients Logo (use)
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT  Clients Logo", 'eleos'),
   "base"      => "clients",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Eleos Element',
   "params"    => array(
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => "Logo Client",
         "param_name" => "gallery",
         "value" => "",
         "description" => __("Use link out for logo client by enter link input caption image, View guide here: http://vegatheme.com/images/add-link-logo.jpg , Recomended Size: 200 x 130. ", 'eleos')
      ), 
    )));
}

//Contact Info
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT Contact Info", 'eleos'),
   "base"      => "ctinfo",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Eleos Element',
   "params"    => array(
      array(
         'type' => 'iconpicker',
         'heading' => __( 'icon', 'eleos' ),
         'param_name' => 'icon',
         'value' => 'fa fa-info-circle',
         'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'iconsPerPage' => 4000, // default 100, how many icons per/page to display
         ),         
         'description' => __( 'Select icon from library.', 'eleos' ),
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title", 'eleos'),
         "param_name" => "title",
         "value" => "",
         "description" => __("enter the title", 'eleos')
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("info", 'eleos'),
         "param_name" => "content",
         "value" => "",
         "description" => __("Enter the content", 'eleos')
      ),      
    )));
}

//Blog
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT Blog", 'eleos'),
   "base"      => "blog",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Eleos Element',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Nunber Show", 'eleos'),
         "param_name" => "number",
         "value" => "",
         "description" => __("Enter number show", 'eleos')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text shadow", 'eleos'),
         "param_name" => "textsd",
         "value" => "",
         "description" => __("Add link for button", 'eleos')
      ),
      array(
         "type" => "vc_link",
         "heading" => __("Text view all", 'eleos'),
         "param_name" => "linkbox",
         "description" => __("Add text to view all", 'eleos')
      ),
      
    )));
}

//Google Map (use)

if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __("OT eleos Maps", 'eleos'),
   "base"      => "maps",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Eleos Element',
   "params"    => array(
     array(
         "type"      => "attach_image",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Location Image", 'eleos'),
         "param_name"=> "imgmap",
         "value"     => "",
         "description" => __("Upload Location Image.", 'eleos')
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Latitude", 'eleos'),
         "param_name"=> "latitude",
         "value"     => 40.7442485,
         "description" => __("Find Latitude code: <a href='http://www.latlong.net/' target='_blank'>view more</a>", 'eleos')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Longitude", 'eleos'),
         "param_name"=> "longitude",
         "value"     => -73.9770405,
         "description" => __("Find Longitude code: <a href='http://www.latlong.net/' target='_blank'>view more</a>", 'eleos')
      ),    
       array(
         "type"      => "textarea",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Detail", 'eleos'),
         "param_name"=> "content",
         "value"     => '',
         "description" => __("", 'eleos')
      ), 
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Enter number for Zoom Map", 'eleos'),
         "param_name"=> "zoommap",
         "value"     => 14,
         "description" => __("", 'eleos')
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Enter number for saturation", 'eleos'),
         "param_name"=> "saturation",
         "value"     => -30,
         "description" => __("", 'eleos')
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Enter number for brightness", 'eleos'),
         "param_name"=> "brightness",
         "value"     => 14,
         "description" => __("", 'eleos')
      ),
    )));
}
?>