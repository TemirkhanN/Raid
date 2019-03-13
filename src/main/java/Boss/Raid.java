package Boss;

import Overseer.Subject;
import Player.Party;

public class Raid implements Subject {
    private Boss boss;

    private Party party;

    public Raid(Boss boss, Party party) {
        this.boss = boss;
        this.party = party;
    }

    public Boss getBoss() {
        return boss;
    }

    public Party getParty() {
        return party;
    }
}
