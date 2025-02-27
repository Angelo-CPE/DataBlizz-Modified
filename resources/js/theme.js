function lightsOff(){
    if(localStorage.theme === 'dark' || 
        (!("theme" in localStorage) && 
        window.matchMedia("(prefers-color-scheme:dark)").matches))
    {
        document.documentElement.classList.add("dark");
    }else{
        document.documentElement.classList.remove("dark");
    }
}

function lightsOn(){
    if(localStorage.theme === 'dark' || 
        (!("theme" in localStorage) && 
        window.matchMedia("(prefers-color-scheme:dark)").matches))
    {
        document.documentElement.classList.remove("dark");
        localStorage.theme="light";
    }else{
        document.documentElement.classList.add("dark");
        localStorage.theme="dark";
    }
}

export{lightsOff, lightsOn};