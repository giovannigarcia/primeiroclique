
--
-- Estrutura da tabela `resultado`
--

CREATE TABLE `resultado` (
  `coordX` int(11) NOT NULL,
  `coordY` int(11) NOT NULL,
  `elementoClick` varchar(255) NOT NULL,
  `idResultado` int(11) NOT NULL,
  `Tarefa_idTarefa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estrutura da tabela `tarefa`
--

CREATE TABLE `tarefa` (
  `descricao` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `idTarefa` int(11) NOT NULL,
  `Teste_idTeste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estrutura da tabela `teste`
--

CREATE TABLE `teste` (
  `nomeTeste` varchar(255) NOT NULL,
  `idTeste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `idUsers` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



--
-- Indexes for dumped tables
--

--
-- Indexes for table `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`idResultado`);

--
-- Indexes for table `tarefa`
--
ALTER TABLE `tarefa`
  ADD PRIMARY KEY (`idTarefa`);

--
-- Indexes for table `teste`
--
ALTER TABLE `teste`
  ADD PRIMARY KEY (`idTeste`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resultado`
--
ALTER TABLE `resultado`
  MODIFY `idResultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11789;

--
-- AUTO_INCREMENT for table `tarefa`
--
ALTER TABLE `tarefa`
  MODIFY `idTarefa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `teste`
--
ALTER TABLE `teste`
  MODIFY `idTeste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

