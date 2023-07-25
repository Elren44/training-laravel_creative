import './bootstrap';
//
const row = document.querySelectorAll('.table-row')


for (let i = 0; i < row.length; i++) {
    let self = row[i]

    self.addEventListener('click', () => {
        window.document.location = self.dataset.href
    })
    self.addEventListener("mouseover", () => {
        self.classList.add('table-primary')
    })
    self.addEventListener("mouseleave", () => {
        self.classList.remove('table-primary')
    })
}
