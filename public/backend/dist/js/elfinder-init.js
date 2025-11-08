/**
 * Inicializa o elFinder integrado com CKEditor
 *
 * @param {string} connectorUrl - URL do conector do elFinder
 * @param {string} soundsPath - Caminho para os sons do elFinder
 * @param {string} locale - Idioma (ex: 'pt_BR')
 * @param {string} csrfToken - Token CSRF do Laravel
 */
function initElfinder(connectorUrl, soundsPath, locale, csrfToken) {
    // Função auxiliar para obter parâmetros da URL
    function getUrlParam(paramName) {
        const reParam = new RegExp('(?:[?&]|&amp;)' + paramName + '=([^&]+)', 'i');
        const match = window.location.search.match(reParam);
        return match && match.length > 1 ? match[1] : '';
    }

    $(document).ready(function () {
        const funcNum = getUrlParam('CKEditorFuncNum');

        $('#elfinder').elfinder({
            lang: locale || 'en',
            customData: {
                _token: csrfToken,
            },
            url: connectorUrl,
            soundPath: soundsPath,
            getFileCallback: function (file) {
                // Retorna a URL do arquivo para o CKEditor
                window.opener.CKEDITOR.tools.callFunction(funcNum, file.url);
                window.close();
            },
        });
    });
}
