export default {
    call: stub().returns(new Promise(function (resolve) {
        resolve();
    }))
};