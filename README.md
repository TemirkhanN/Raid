# Raid

Simple console raid simulation

## API requirements

- Create player
- Invite another player to party
- Go for the raid (Chain: seek for boss then start raid)
- [Attack boss](#attack-boss)
- Defend up

> Boss must attack by timeout 
> Killing boss should grant loot for party members - that's for next steps


#Attack boss

Sends signal to perform attack by given player. That means get player by name and perform attack.
Check if player is allowed to attack:
- check raid status
- check hp of the player
- check actions timeout

After that make calculations and change necessary states. It feels like raid has state flow and requires fsm. But mostly
it would attempt flow from "in_process" to "completed" if guards allows that.