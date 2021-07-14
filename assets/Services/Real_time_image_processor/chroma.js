var imgFG = null;
var imgBG = null;

//Take forward image from user
function frontimg(){
    var fileInput = document.getElementById("fgFile");
    var canvas = document.getElementById("pic1");
    imgFG = new SimpleImage(fileInput);
    imgFG.drawTo(canvas);
}

//Take background image from user
function backimg(){
    var fileInput = document.getElementById("bgFile");
    var canvas = document.getElementById("pic2");
    imgBG = new SimpleImage(fileInput);
    imgBG.drawTo(canvas);
}

//Merge the forward and background image together
function merge(){
    clear();
    var pic1 = document.getElementById("pic1");

    var outputImage = new SimpleImage(imgFG.width, imgFG.height);

    for(var pixel of imgFG.values()){
        if(pixel.getGreen() > pixel.getRed() + pixel.getBlue()){
            var x= pixel.getX();
            var y= pixel.getY();
            var newPixel = imgBG.getPixel(x,y);
            outputImage.setPixel(x, y, newPixel);
        }
        else{
            outputImage.setPixel(pixel.getX(), pixel.getY(), pixel);
        }
    }
    outputImage.drawTo(pic1);
}

//Clear the previous input and output
function clear() {
    var pic1 = document.getElementById("pic1");
    var pic2 = document.getElementById("pic2");
    var context = pic1.getContext("2d");
    context.clearRect(0, 0, pic1.width, pic1.height);
    context = pic2.getContext("2d");
    context.clearRect(0, 0, pic2.width, pic2.height);
}