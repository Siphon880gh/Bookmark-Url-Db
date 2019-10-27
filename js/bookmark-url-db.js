var bookmarkDb = {
    objToBookmark: (objHandler, feedback) => {
        var obj = objHandler();
        var data = JSON.stringify(obj);

        var URLParams = new URLSearchParams(window.location.search)
        URLParams.set("data", data);
        window.history.pushState(null, "bookmarkDb", "?" + URLParams.toString());
        if(feedback) feedback();
    },
    
    bookmarkToObj: (objHandler, feedback) =>  {
        var URLParams = new URLSearchParams(window.location.search)
        var data = URLParams.get("data");
        if(data) {
            obj = JSON.parse(data);
            objHandler(obj);
            if(feedback) feedback();
        }
    }
}

$(()=>{
    bookmarkDb.bookmarkToObj(objToForm, ()=>{alert("Loaded from bookmarks");});
});