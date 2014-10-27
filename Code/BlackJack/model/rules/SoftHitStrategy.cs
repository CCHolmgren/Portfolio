using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BlackJack.model.rules
{
    class SoftHitStrategy : IHitStrategy
    {
        public bool DoHit(model.Player a_dealer)
        {
            int[] cardScores = new int[(int)model.Card.Value.Count] { 2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 10, 10, 11 };
            int score = 0;

            foreach (Card c in a_dealer.GetHand())
            {
                if (c.GetValue() != Card.Value.Hidden)
                {
                    score += cardScores[(int)c.GetValue()];
                }
            }

            if (score == 17 || score > 21)
            {
                foreach (Card c in a_dealer.GetHand())
                {
                    if (c.GetValue() == Card.Value.Ace && (score == 17 || score > 21))
                    {
                        score -= 10;
                    }
                }
            }
            return score <= 17;
        }
    }
}
