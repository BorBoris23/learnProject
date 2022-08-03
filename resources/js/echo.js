Echo
    .channel('whatChanged')
    .listen('.event.articlesChanges', (e) => {
        alert(e.title);
    });
