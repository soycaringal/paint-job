$(document).ready(() => {
    poll();
})


function template(cars) {
    let template = '<tr> \ 
        < td > Mark</td> \
    <td>Otto</td> \
    <td>@mdo</td> \
    <td>@mdo</td> \
                </tr > ';
}
function getData() {
    $.get('/api/cars')
        .then((res) => {

        });

    poll();
}
function poll() {
    setTimeout(() => {
        getData()
    }, 3000);
}