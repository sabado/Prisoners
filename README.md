# Prisoners

Yesterday i seen this [Veritasium episode](https://www.youtube.com/watch?v=iSNsgj1OCLA) about a prisoners riddle and decided to simulate the answer. 



# Install

1. Clone this Repo
2. run `composer update`
3. go to bin folder and run one of the simulation scripts. `./simulate_one` or `./simulate_batch` 

## Using simulate_one 

`simulate_one <prisoners> <graph>` simulate only one itheration with a specified size of prisoners. 

* First argument specifies the quantity of prisioners, and boxes related to they.
* Optional second argument, if defined, show graphs of the room distribution.

Example:
```
$ ./simulate_one 10 graph

* Using 10 Prisoners

* Room Distribution ( box -> prisoner ) 

 | 7  → 3  | 5  → 2  | 9  → 7  | 6  → 5  | 

 | 3  → 9  | 8  → 8  | 2  → 10 | 4  → 4  | 

 | 1  → 1  | 10 → 6  |         |         | 

 Prisoner # |  Attempts  |  Results  
    # 1     |     1      |    win     
    # 2     |     4      |    win     
    # 3     |     3      |    win     
    # 4     |     1      |    win     
    # 5     |     4      |    win     
    # 6     |     4      |    win     
    # 7     |     3      |    win     
    # 8     |     1      |    win     
    # 9     |     3      |    win     
    # 10    |     4      |    win     

Final Result: They win
```

## Using simulate_batch
`simulate_batch <prisoners> <itherations>`

Example:
```
./simulate_batch 100 100
Simulating a 100 Prisoners experiment.
Simulation size is 100
Simulation results: 
  They Live: 31
  They Dead: 69
  Live Rate: 31 %
  ```

