
document.querySelector('form').addEventListener('submit', function(){
    alert("Expense added successfully!");
});

document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('mouseenter', () => card.style.transform = 'translateY(-5px)');
    card.addEventListener('mouseleave', () => card.style.transform = 'translateY(0)');
});


const addForm = document.querySelector('form');
if(addForm){
    addForm.addEventListener('submit', () => {
      
        if(document.querySelector('button[name="add"]')){
            alert("Expense added successfully!");
        }
    });
}


if(window.Chart){
    Chart.defaults.plugins.tooltip.backgroundColor = 'rgba(13,110,253,0.8)';
    Chart.defaults.plugins.tooltip.titleColor = '#fff';
    Chart.defaults.plugins.tooltip.bodyColor = '#fff';
}
