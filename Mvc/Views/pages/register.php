 <section class="form__login" >
   
        <div class="container__form">
            <form method="post" enctype="multipart/form-data"  >
                <h2>Entre na tela de controle!</h2>
                <div class="wrap__form">
                     <label for="">Seu Nome de Usuário:</label>
                     <input type="text" name="cadastro-nome"  >
                </div><!--wrap__form-->
                <div class="wrap__form">
                     <label for="">Seu email de cadastro:</label>
                     <input type="email" name="cadastro-email"  >
                </div><!--wrap__form-->
                <div class="wrap__form">
                    <select name="cargos" id="">
                        <option value="Administrador">Administrador</option>
                        <option value="Sub Administrador">Sub Administrador</option>
                        <option value="Normal">Normal</option>
                    </select>
                </div><!--wrap__form-->
                <div class="wrap__form">
                    <label for="">Crie a sua senha:</label>
                     <input type="password" name="cadastro-senha">
                </div><!--wrap__form-->

                <div class="wrap__form">
                    <label for="">Imagem</label>
                    <input type="file" name="imagem" >
                </div><!--wrap__form-->

                <input type="submit" name="cadastrar" value="Cadastrar"   >
            </form>
        </div><!--container__form-->
         <div class="voltar"><a  href="login">Voltar!</a></div>
    </section><!--form__login-->
</body>
</html>