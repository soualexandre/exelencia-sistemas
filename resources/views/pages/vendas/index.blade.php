<x-app-layout>
    @include('alerts.success')
    @include('alerts.errors')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <form>
        @csrf
        <div class="formBox">
            <label for="method">Vendas</label>
            <input type="text" id="method" placeholder="Title" />
        </div>
        <div class="formBox">
            <label for="value">value</label>
            <input type="number" id="value" placeholder="value" />
        </div>
        <div class="formBox">
            <button id="btn">Click to Add</button>
        </div>
        <div id="msg">
            <pre></pre>
        </div>
    </form>
    <script>
        let vendas = [];
        // example {id:1592304983049, method: 'Deadpool', value: 2015}
        const addMovie = (ev) => {
            ev.preventDefault(); //to stop the form submitting
            let venda = {
                id: Date.now(),
                method: document.getElementById('method').value,
                value: document.getElementById('value').value
            }
            vendas.push(venda);
            document.forms[0].reset(); // to clear the form for the next entries
            //document.querySelector('form').reset();

            //for display purposes only
            console.warn('added', {
                vendas
            });
            let pre = document.querySelector('#msg pre');
            pre.textContent = '\n' + JSON.stringify(vendas, '\t', 2);

            //saving to localStorage
            localStorage.setItem('vendasList',  JSON.stringify(vendas));
        }

        const addBanco = (ev) => {
            ev.preventDefault();
            var listagem = localStorage.getItem('vendasList');
            var dados = listagem;
            $.ajax({
                url: "/vendas/create",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                contentType : 'application/json',
                data: dados,
                dataType: 'json',
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('btn').addEventListener('click', addMovie);
        });
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('send').addEventListener('click', addBanco);
        });
    </script>
    <div class="formBox">
        <button id="send">Confirmar</button>
    </div>
</x-app-layout>
