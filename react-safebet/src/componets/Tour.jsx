import useSafeBet from "../hooks/useSafeBet"

export default function Tour({tour}){
    
    const {handleClickCategoria, categoriaActual} = useSafeBet();
    const {name, id} = tour

    const resaltarCategoriaActual = () => categoriaActual.id === id ? 'bg-amber-400':'bg-white'

    let imagen

    if (name.startsWith ("ATP")){
        imagen="/img/atp-tour.png" 
    }else if (name.startsWith ("WTA")){
        imagen="/img/wta-tour.png"
    }else if (name.startsWith ("ITF")){
        imagen="/img/itf-tour.png"
    }else if (name.startsWith ("UTR")){
        imagen="/img/utr-tour.png"
    }

    return (
        <div className={`${resaltarCategoriaActual()} flex items-center gap-4 border w-full p-3 hover:bg-amber-400 cursor-pointer`}>
               <img
                    className="w-20"
                    src={imagen}                 
                />
            <button 
                className="text-lg font-bold cursor-pointer"
                type="button"
                onClick = {() => handleClickCategoria(id)}
            > 
                {name}
            </button>
        </div>
    )
}