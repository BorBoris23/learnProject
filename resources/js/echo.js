Echo
    .channel('test')
    .listen('TestArticleChange', (e) => {
       console.log(e.changes);
    });

