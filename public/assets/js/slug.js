const slugify = text =>
  text
    .toString()
    .normalize('NFD')
    .replace(/[\u0300-\u036f]/g, '')
    .toLowerCase()
    .trim()
    .replace(/\s+/g, '-')
    .replace(/[^\w-]+/g, '')
    .replace(/--+/g, '-')

const translit = (word) => {
    let answer = '';
    let converter = {
     'а': 'a',    'б': 'b',    'в': 'v',    'г': 'g',    'д': 'd',
         'е': 'e',    'ё': 'e',    'ж': 'zh',   'з': 'z',    'и': 'i',
         'й': 'y',    'к': 'k',    'л': 'l',    'м': 'm',    'н': 'n',
         'о': 'o',    'п': 'p',    'р': 'r',    'с': 's',    'т': 't',
         'у': 'u',    'ф': 'f',    'х': 'h',    'ц': 'c',    'ч': 'ch',
         'ш': 'sh',   'щ': 'sch',  'ь': '',     'ы': 'y',    'ъ': '',
         'э': 'e',    'ю': 'yu',   'я': 'ya',
        
         'А': 'A',    'Б': 'B',    'В': 'V',    'Г': 'G',    'Д': 'D',
         'Е': 'E',    'Ё': 'E',    'Ж': 'Zh',   'З': 'Z',    'И': 'I',
         'Й': 'Y',    'К': 'K',    'Л': 'L',    'М': 'M',    'Н': 'N',
         'О': 'O',    'П': 'P',    'Р': 'R',    'С': 'S',    'Т': 'T',
         'У': 'U',    'Ф': 'F',    'Х': 'H',    'Ц': 'C',    'Ч': 'Ch',
         'Ш': 'Sh',   'Щ': 'Sch',  'Ь': '',     'Ы': 'Y',    'Ъ': '',
         'Э': 'E',    'Ю': 'Yu',   'Я': 'Ya'
        };
        
        for (let i = 0; i < word.length; ++i ) {
         if (converter[word[i]] == undefined){
          answer += word[i];
         } else {
          answer += converter[word[i]];
         }
        }
        
        return answer;
};

// console.log(slugify(translit("поверяю данную функцию йооооооо джаваскрипт сила")))

document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('section form');

    if (form) {
        const titleInput = form.querySelector('input[name="title"]');
        const slugInput = form.querySelector('input[name="slug"]');

        titleInput.addEventListener('input', (event) => {

            const slug = slugify(translit(event.target.value));

            slugInput.value = slug;
            slugInput.setAttribute("value", slug);
        })
    }




});