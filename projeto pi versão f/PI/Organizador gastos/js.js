const form = document.getElementById('form');

function k(i) {
    var v = i.value.replace(/\D/g,'itotal');
    v = (v/100).toFixed(2) + '';
    v = v.replace(".", ",");
    v = v.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
    i.value = v;
};
