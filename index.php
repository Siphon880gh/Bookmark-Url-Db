<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Bookmarking Url Db</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <!-- jQuery and Bootstrap  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

    <!-- Bootstrap Toggle Button -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        
    <link href="css/index.css?v=<?php echo time(); ?>" rel="stylesheet">
    <script src="js/bookmark-url-db.js?v=<?php echo time(); ?>"></script>
    
</head>
    <body>
        <div class="container">
          <div id="desc">
            <h4>Bookmark Url Db</h4>
            <p>By Weng Fei Fung. This plugin allows you to save information such as DOM state or form values into the bookmark. When the user opens the bookmark, that information becomes available to the webpage. It is also available to anyone they share the URL to. How this works is by appending the information into the URL.</p>
          </div>
          <div class="spacer"></div>

          <div class="panel panel-default">
            <div class="panel-heading">Test Form</div>
            <div class="panel-body">

            <div class="input-group">
                <label for="age">Name:&nbsp;</label>
                  <input type="text" id="name" value="" placeholder="Your name..."/>
              </div>
              <div class="spacer"></div>

              <div class="input-group">
                <label for="age">Age:&nbsp;</label>
                  <select id="age">
                    <option name="" id="">1-12</option>
                    <option name="" id="">13-18</option>
                    <option name="" id="">19-24</option>
                    <option name="" id="">25-35</option>
                    <option name="" id="">36-45</option>
                    <option name="" id="">46-67</option>
                    <option name="" id="">Prefer not to state</option>
                  </select>
              </div>
              <div class="spacer"></div>

              <div class="input-group">
                <label for="verified">Verified:&nbsp;</label>
                <input id="verified" type="checkbox" checked data-toggle="toggle" data-size="mini">
              </div>

            </div> <!--/ panel-body -->
          </div> <!--/ panel-default -->

        </div> <!-- /.container -->

        <script>
          // Callback that extracts object from DOM. That object becomes a bookmark object.
          function formToObj() {
            return {
              name: $("#name").val(),
              age: $("#age").val(),
              verified: $("#verified").closest(".toggle").hasClass("off") ? false: true
            }
          } // formToObj

          // Callback that renders DOM from bookmark object
          function objToForm(data) {
            var {name, age, verified} = data;

            $("#name").val(name);
            $("#age").val(age);

            if(verified)
              $("#verified").closest(".toggle").removeClass("off");
            else
              $("#verified").closest(".toggle").addClass("off");

          } // objToForm
        
        </script>

        <div class="float-corner">
          <div class="btn btn-primary" onclick="bookmarkDb.objToBookmark(formToObj, ()=>{alert('Information saved. Bookmark or copy the URL now.')})">Prepare for bookmarking</div>
        </div>

        <script>
        $(()=>{
          bookmarkDb.bookmarkToObj(objToForm, ()=>{alert("Loaded from bookmarks");});
        });
        </script>
        
    </body>
</html>