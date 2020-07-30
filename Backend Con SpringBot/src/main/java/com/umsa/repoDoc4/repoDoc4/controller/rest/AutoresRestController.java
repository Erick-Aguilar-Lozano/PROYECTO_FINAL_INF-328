package com.umsa.repoDoc4.repoDoc4.controller.rest;

import com.umsa.repoDoc4.repoDoc4.model.Autores;
import com.umsa.repoDoc4.repoDoc4.model.common.RepBase;
import com.umsa.repoDoc4.repoDoc4.repository.AutoresRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.autoconfigure.data.web.SpringDataWebProperties;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.awt.print.Pageable;
import java.util.List;

@RestController
@RequestMapping("/api/v1/autores")
public class AutoresRestController {

    @Autowired
    private AutoresRepository repository;

    // INSERCION DE DATOS
    @PutMapping
    public ResponseEntity<RepBase> insert(@RequestBody Autores autores){
        // debemos devolver un cuerpo
        return ResponseEntity.ok(new RepBase(repository.insert(autores)));
    }


    // ACTUALIZACION DE DATOS
    @PostMapping
    public ResponseEntity<RepBase> update(@RequestBody Autores autores){
        // debemos devolver un cuerpo
        return ResponseEntity.ok(new RepBase(repository.update(autores)));
    }

    @GetMapping
    public ResponseEntity<List<Autores>> findAll(SpringDataWebProperties.Pageable pageable){
        return ResponseEntity.ok(repository.findAll(pageable));
    }

    @GetMapping("/{id}")
    public ResponseEntity<Autores> findById(@PathVariable int id){
        return ResponseEntity.ok(repository.findById(id));
    }
}
