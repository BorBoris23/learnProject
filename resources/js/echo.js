Echo
    .channel('articleChanges')
    .listen('ArticleChange', (e) => {
        alert(e.articleChanges);
    });
