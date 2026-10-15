fetch("http://grippy.learn.pierre-godino.com/api/mock/dom-users")
    .then((response) => {
        return response.json();
    })
    .then((data) => {
        console.log(data);
    });


