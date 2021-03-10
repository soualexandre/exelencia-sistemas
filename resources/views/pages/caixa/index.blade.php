<x-app-layout>
    @include('alerts.success')
    @include('alerts.errors')

  
    <form clas="ml-4" method="post" action="{{route('vendas.create')}}">
        @csrf
        <div class="container">
            <div class="container col-8 mt-12">
                <label>Gastos</label>
                <select class="form-select" name='method' aria-label="Default select example" required>
                    <option selected>Selecione um tipo</option>
                    <option value="CRÉDITO">Tribultos</option>
                    <option value="DÉBITO">Custo Aquisição / Custo de Compra</option>
                    <option value="DINHEIRO">Gastos com vendas</option>
                    <option value="CHEQUE">Gastos com pessoal</option>
                    <option value="BOLETO">Despesas de funcionamento</option>
                    <option value="BOLETO">Despesas administrativas</option>
                    <option value="BOLETO">Despesas financeiras</option>
                    <option value="BOLETO">Encargos Sociais</option>
                    <option value="BOLETO">Pagamentos de empréstimos e Financiamentos</option>
                    <option value="BOLETO">Compa de imobilizados / Investimentos</option>
                    <option value="BOLETO">Demais movimentações financeiras</option>






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
</x-app-layout>