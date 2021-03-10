<x-app-layout>
    @include('alerts.success')
    @include('alerts.errors')

  
    <form clas="ml-4" method="post" action="{{route('vendas.create')}}">
        @csrf
        <div class="container">
            <div class="container col-8 mt-12">
                <label>Tipo de transação</label>
                <select class="form-select" name='method' aria-label="Default select example" required>
                    <option selected>Selecione um tipo</option>
                    <option value="CRÉDITO">Cartão de crédito</option>
                    <option value="DÉBITO">Cartão débito</option>
                    <option value="DINHEIRO">Dinheiro</option>
                    <option value="CHEQUE">Cheque</option>
                    <option value="BOLETO">Boleto</option>
                </select>

            </div>
            <div class="container col-8 xol-xs-10 mt-4 jd-grid gap-2 d-md-flex justify-content-md-start">
                <div class="input-group">
                    <input type="number" name="value" class="form-control" required aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text">.00 R$</span>
                </div>
            </div>
            <div class="container col-8 d-grid mt-4 gap-2 d-md-flex justify-content-md-end">
                <button type="submit" id="btn-cadastrar" class="btn ">Cadastrar</button>
            </div>
        </div>
    </form>

    <div class="table-vendas text-center">
    <div class="mt-6">~
        <h3>Informações</h3>
    <div>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">Pagamento</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Data</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendas as $venda)
                <tr>
                    <td>{{$venda->method}}</td>
                    <td>{{$venda->value}},00 R$ </td>
                    <td>{{date('d/m/y', strtotime($venda->date))}}</td>
                    <td>
                        <a href="#alterar">Alterar</a>
                        <a href="#apagar">Deletar</a>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
        @if(count($vendas)== 0)
        <p>Nenhuma venda encontrada
            @endif
    </div>
    </div>
    </div>
</x-app-layout>