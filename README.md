# Bookmark Url Db

By Weng Fei Fung. This plugin allows you to save information such as DOM state or form values into the bookmark. When the user or whoever they share the link with opens the bookmark, that information loads to the webpage. How this works is by appending the information into the URL.

## Getting Started

All you need is the file bookmark-url-db.js

### Prerequisites

None

### How to make it work

index.php has a demo page with form information that gets saved to bookmark/url and gets rendered when you load from that url.

Preferably after DOM Ready, run this function bookmarkDb.bookmarkToObj(function that returns an object, function that provides feedback to user that it's been loaded from the bookmark/url). That second parameter is optional.
```
function objToForm(data) {
    var {name, age, verified} = data;

    $("#name").val(name);
    $("#age").val(age);

    if(verified)
        $("#verified").closest(".toggle").removeClass("off");
    else
        $("#verified").closest(".toggle").addClass("off");

} // objToForm

bookmarkDb.bookmarkToObj(objToForm, ()=>{alert("Loaded from bookmarks");});
```

Create a button somewhere on the page or run it dynamically every time you want to make the information saved to the URL for bookmarking or sharing. Use this code: bookmarkDb.objToBookmark(function that returns an object, function that provides feedback that that webpage is ready to be bookmarked or shared)}). The second parameter is optionally, and recommended to be skipped if you're doing this dynamically.
```
function formToObj() {
    return {
        name: $("#name").val(),
        age: $("#age").val(),
        verified: $("#verified").closest(".toggle").hasClass("off") ? false: true
    }
} // formToObj

bookmarkDb.objToBookmark(formToObj, ()=>{alert('Information saved. Bookmark or copy the URL now.')})
```

Notice that jQuery is not necessary. You could use vanilla javascript to grab the values. Those are callbacks that you provide.

## Authors

* **Weng Fei Fung** - *Author* - [Siphon880gh](https://github.com/Siphon880gh)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
