    // Get references to the gallery, and navigation buttons
    const gallery = document.querySelector(".gallery");
const photos = document.querySelectorAll(".photo-card");
const totalPhotos = photos.length;
const photoWidth = photos[0].offsetWidth;

let index = 0;
let isTransitioning = false;

// Clone first three images and add them at the end for infinite looping
const firstClones=[];
const lastClones=[];
for (let i = 0; i < 3; i++) {
    let cloneStart = photos[i].cloneNode(true);
    let cloneEnd=photos[totalPhotos - 3 +i].cloneNode(true);
    firstClones.push(cloneStart);
    lastClones.push(cloneEnd)
    gallery.appendChild(cloneStart);
    gallery.prepend(cloneEnd);
}

gallery.style.transform=`translateX(-${3*photoWidth}px)`;
// Update function to move gallery
function updateGallery(instant = false) {
    gallery.style.transition = instant ? "none" : "transform 1s ease-in-out";
    gallery.style.transform = `translateX(-${(index+3)*photoWidth}px)`;
}

// Move to the next set
function nextSlide() {
    if (isTransitioning) return;
    isTransitioning = true;
    index += 3;
    updateGallery();

    // Reset to the beginning after transition completes
    setTimeout(() => {
        if (index >= totalPhotos) {
            index = 0;
            updateGallery(true);
        }
        isTransitioning = false;
    }, 500);
}

// Move to the previous set
function prevSlide() {
    if (isTransitioning) return;
    isTransitioning = true;

    index -= 3;
    if (index < 0) {
        index = totalPhotos - 3;
        updateGallery(true);
    }

    setTimeout(() => {
        updateGallery();
        isTransitioning = false;
    }, 50);
}

// Button Event Listeners
document.querySelector(".prev").addEventListener("click", prevSlide);
document.querySelector(".next").addEventListener("click", nextSlide);

// Auto slide every 3 seconds
setInterval(nextSlide, 3000);

// Ensure the initial position
updateGallery(true);
  // __________________break_______________________


let x=document.querySelectorAll('.mySlides')

console.log(x)
let counter=0;
x.forEach(
    (slides,index) => {
        console.log(slides);
    slides.style.left =`${index * 100}%`
}
)

const slideImage=()=>{
    x.forEach(
        (slides) => {
        slides.style.transform =`translateX(-${counter * 100}%)`;
        
    }
    )

    if(counter>=x.length-1){
        counter=-1
    }
}

function forword(){
    counter++;
    slideImage();
}

function bacword(){
    counter--;
    slideImage();
}

setInterval(forword,2000)
console.log(x)






  function toggleDropdown() {
      document.getElementById("dropdownMenu").classList.toggle("show");
  }
  
  // Close the dropdown if clicked outside
//   window.onclick = function(event) {
//       if (!event.target.matches('.profile-container img')) {
//           var dropdown = document.getElementById("dropdownMenu");
//           if (dropdown.classList.contains('show')) {
//               dropdown.classList.remove('show');
//           }
//       }
//   }