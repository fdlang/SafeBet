
export function formatNameTorneo(text) {
	const words = text.split('-');
	const formattedWords = words.map((word, index) => {
			if (index === 0) {
				return word.toUpperCase();
			} else {
				return word.charAt(0).toUpperCase() + word.slice(1);
			}
	});
	const formattedText = formattedWords.join(' ');

	return formattedText;
}

export function firstLetterUpperCase(text) {
	if (text.includes('-')) {
		const formattedText = text.replace(/-/g, ' ').charAt(0).toUpperCase() + text.replace(/-/g, ' ').slice(1).toLowerCase();
		return formattedText;
	} else {
		const formattedText = text.charAt(0).toUpperCase() + text.slice(1).toLowerCase();
		return formattedText;
	}
}

export function removeParentheses(text) {
	return text.replace(/\(|\)/g, '');
}

export function removeTagAndContent(text) {
	return text.replace(/<[^>]+>/g, '');
}

export function category(name) {
	if(name.includes("doubles")){
		return "Doble"
	}else return "Individual"
}
export function delCategory(name) {
	let result = name;
	result = result.replace(/Doubles/g, "").replace(/Men/g, "").replace(/Women/g, "");

	return result.trim();
}

export function sexo(name) {
	if(name.includes("women")){
		return "Femenino"
	}else return "Masculino"
}

export function porcentajeAcierto(cuota) {
	var porcentaje = (1 / cuota) * 100;
	return porcentaje.toFixed(2); // Redondea el resultado a 2 decimales
}

export function separarNombres(nombres) {
	const nombresSeparados = nombres.split("/");

	if (nombresSeparados.length === 2) {
		const nombre1 = nombresSeparados[0].trim();
		const nombre2 = nombresSeparados[1].trim();
		return [nombre1, nombre2];
	}
	return ""; 
}