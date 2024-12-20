/**
 * Initiate Datatables
 */
const datatables = select('.datatable', true)
datatables.forEach(datatable => {
    new simpleDatatables.DataTable(datatable);
})


/**
 * Easy event listener function
 */
const on = (type, el, listener, all = false) => {
    if (all) {
        select(el, all).forEach(e => e.addEventListener(type, listener))
    } else {
        select(el, all).addEventListener(type, listener)
    }
}