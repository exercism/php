# Introduction

The concepts of covariance and contravariance in PHP are important as PHP enforces these rules are followed when extending classes or interfaces.

Covariance preserves the relationship between two types, while contravariance reverses that relationship. In short it means that when extending classes and overriding functions, you may allow more or less specific types for your method's parameters, and you may return fewer or more specific types from the method.
