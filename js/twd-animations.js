const toBeAnimated = document.querySelectorAll('.animate');

toBeAnimated.forEach(element => {
    element.classList.add('hide');
});


const fadeOptions = {
    threshold: .5,

};

const appearOnScroll = new IntersectionObserver((entries, appearOnScroll) => {
    entries.forEach(entry => {
        if (!entry.isIntersecting) {
            return;
        } else {
                entry.target.classList.remove('hide');
                entry.target.classList.add('show');
                appearOnScroll.unobserve(entry.target);
        }
    })
}, fadeOptions);

toBeAnimated.forEach(element => {
    appearOnScroll.observe(element);
});